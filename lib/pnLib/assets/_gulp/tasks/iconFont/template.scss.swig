/**
 *  -----------------------------------------------
 *
 *  IMPORTANT NOTICE
 *  {{comment}}
 *
 *  shared/ICONS
 *
 *  1. Generic
 *  -----------------------------------------------
 */

@font-face {
    font-family: '{{fontName}}';
    src: url("{{fontPath}}/{{fontName}}.eot?{{cacheBreaker}}");
    src: url("{{fontPath}}/{{fontName}}.eot?{{cacheBreaker}}#iefix") format('embedded-opentype'),
         url("{{fontPath}}/{{fontName}}.woff?{{cacheBreaker}}") format('woff'),
         url("{{fontPath}}/{{fontName}}.ttf?{{cacheBreaker}}") format('truetype'),
         url("{{fontPath}}/{{fontName}}.svg#{{fontName}}?{{cacheBreaker}}") format('svg');
    font-weight: normal;
    font-style: normal;
}

@mixin getIcon($content, $direction) {
    @if $direction == 'right' {

        &:after {
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            content: $content;
            font-family: '{{fontName}}';
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            line-height: 1;
            speak: none;
            text-transform: none;
            @content
        }
        &:before { content: none; }
    } @else {
        &:before {
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            content: $content;
            font-family: '{{fontName}}';
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            line-height: 1;
            speak: none;
            text-transform: none;
            @content
        }
    }
}

{% for icon in icons -%}
@mixin icon--{{icon.name}}($direction) {
    @include getIcon("\{{icon.code}}", $direction) {
        @content;
    }
}

.icon {
    &_{{icon.name}} {
        @include icon--{{icon.name}}('left');
        
        &.icon_right {
            @include icon--{{icon.name}}('right')
        }
    }
}

{% endfor %}
