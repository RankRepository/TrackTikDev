<?php
$pnPostTypeJobs = new PnPostType( "job", "Jobs");

$pnPostTypeJobs->set("office", "Office ", "text");
$pnPostTypeJobs->set("general_job", "General Job (For Apply Now button) ", "checkbox");

$pnPostTypeJobs->addTaxonomy("job_category", "Jobs categories ");



$pnPostTypeCandidature = new PnPostType( "jobcandidature", "Jobs Candidature");

$pnPostTypeCandidature->set("job", "Job", "text");
$pnPostTypeCandidature->set("name", "Nom ", "text");
$pnPostTypeCandidature->set("email", "Courriel ", "text");
$pnPostTypeCandidature->set("phone", "Téléphone ", "text");
$pnPostTypeCandidature->set("comment", "Comment ", "textarea");
$pnPostTypeCandidature->set("cv", "CV ", "text");

/**
 *
 * Remove accent for file upload
 *
 * @param $str
 * @param string $charset
 * @return mixed|string
 */
function wd_remove_accents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

    return $str;
}



/*
 * Create new filename if already exists
 */
function file_newname($path, $filename){
    if ($pos = strrpos($filename, '.')) {
        $name = substr($filename, 0, $pos);
        $ext = substr($filename, $pos);
    } else {
        $name = $filename;
    }

    $newpath = $path.'/'.$filename;
    $newname = $filename;
    $counter = 0;
    while (file_exists($newpath)) {
        $newname = $name .'_'. $counter . $ext;
        $newpath = $path.'/'.$newname;
        $counter++;
    }

    return $newname;
}


/**
 * Upload CV and Send Email to admin
 */
add_action( 'wp_ajax_tracktik_send_cv', "tracktik_send_cv" );
add_action( 'wp_ajax_nopriv_tracktik_send_cv', "tracktik_send_cv" );

function tracktik_send_cv(){

    $rep = array();


    // UPLOAD & SAVE PDF
    if( is_array($_FILES))
    {
        $wpuploaddir = wp_upload_dir();
        //$uploaddir = $wpuploaddir["basedir"] . '/membrectaq/';
        $uploaddir = $wpuploaddir["path"] . "/";
        $uploadurl = $wpuploaddir["url"] . "/";
        foreach($_FILES as $file)
        {

            // Check file Type
            $cvFileType = pathinfo($file["name"],PATHINFO_EXTENSION);


            if($cvFileType != "pdf" && $cvFileType != "doc" && $cvFileType != "docx"  ) {
                $rep["status"] = "errorfiletype";
                echo json_encode($rep);
                die();
            }


            // Check file size - 5mb max
            if ($file["size"] > 5000000) {
                $rep["status"] = "errorfilesize";
                echo json_encode($rep);
                die();
            }



            //Upload image if OK

            $filename = (sanitize_file_name( basename($file['name']) ) );
            $filename = sanitizeFilename( wd_remove_accents( $filename ) );
            $prefix = rand(111111, 999999);             ///Prefix to prevent exposure
            $filename = file_newname( $wpuploaddir["path"], $prefix . "_" . $filename );

            $filepath = $uploaddir . $filename;
            $urlpath = $uploadurl . $filename;

            if( move_uploaded_file($file['tmp_name'], $filepath ) )
            {
                // Check the type of file. We'll use this as the 'post_mime_type'.
                $filetype = wp_check_filetype( basename( $filepath ), null );

                // Get candidat Data
                $jobid = isset( $_POST["jobid"] ) ? $_POST["jobid"] : "";
                $jobname = get_the_title($jobid);
                $name = isset( $_POST["name"] ) ? $_POST["name"] : "";
                $phone = isset( $_POST["phone"] ) ? $_POST["phone"] : "";
                $email = isset( $_POST["email"] ) ? $_POST["email"] : "";
                $comment = isset( $_POST["comment"] ) ? $_POST["comment"] : "";


                // Create & Insert post object
                $my_post = array(
                    'post_title'    => $jobname . " - " . $name,
                    'post_status'   => 'private',
                    'post_author'   => 1,
                    'post_type' => "jobcandidature"
                );

                $candidatID = wp_insert_post( $my_post );
                update_post_meta($candidatID, "name", $name);
                update_post_meta($candidatID, "phone", $phone);
                update_post_meta($candidatID, "email", $email);
                update_post_meta($candidatID, "comment", $comment);
                update_post_meta($candidatID, "cv", $urlpath);
                update_post_meta($candidatID, "job", $jobname);
                update_post_meta($candidatID, "jobid", $jobid);


                $rep["status"] = "success";



                //Envoi Email au admin
                $headers = array();
                $headers[] = 'From: Tracktik Jobs <noreply@tracktik.com>';
                $headers[] = 'Content-Type: multipart/alternative';
                $headers[] = 'Content-Type: text/html; charset=UTF-8';

                $message = "";
                $message .= "<b>Job</b> : " . $jobname . "<br/>";
                $message .= "<b>Name</b> : " . $name . "<br/>";
                $message .= "<b>Email</b> : " . $email . "<br/>";
                $message .= "<b>Phone</b> : " . $phone . "<br/>";
                $message .= "<b>Comment</b> : " . nl2br(stripslashes($comment)) . "<br/>";
                $message .= "<b>CV</b> : " . $urlpath . "<br/>";

                $tomail = get_option("tracktick_email_for_jobs");
                wp_mail($tomail, "New application for " . $jobname, $message, $headers);




                // Envoi mail aux candidats
                $tracktick_email_user_subject = get_option("tracktick_email_user_text_jobs_subject_" . ICL_LANGUAGE_CODE);
                $tracktick_email_user_text = get_option("tracktick_email_user_text_jobs_" . ICL_LANGUAGE_CODE);
                $message = nl2br($tracktick_email_user_text);

                wp_mail($email, $tracktick_email_user_subject, $message, $headers);

            }
            else
            {
                $rep["status"] = "errorfile";

            }
        }
    }  // END SAVE LOGO



    echo json_encode( $rep );

    die();
}


?>