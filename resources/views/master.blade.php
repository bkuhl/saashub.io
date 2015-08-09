<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    @yield('meta')

    @if(App::environment('local'))
        <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="/img/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="/css/lato.css">
    @else
        <link rel="shortcut icon" href="http://assets.saashub.io/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="http://assets.saashub.io/favicon.ico" type="image/x-icon"/>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
    @endif

    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/colour.css" rel="stylesheet" type="text/css"/>
    <link href="/css/prettyPhoto.css" rel="stylesheet" type="text/css"/>
    <link href="/css/zocial.css" rel="stylesheet" type="text/css"/>

    <!--[if IE]>
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css">
        .categories {
            text-align: left;
        }
        .categories h3 {
            margin-top: 0;
            text-align: center;
        }
        h1.category-title {
            margin-top: 6px;
            font-size: 30px;
            font-weight: 700;
        }
        .service-card img {
            height: 100px;
            width: 100px;
        }
        .categories ul {
            list-style-type: none;
            padding-left: 0;
        }
        .categories li a {
            display: block;
            padding: 2px 8px;
        }
        .categories li a:hover {
            background-color: #7C899A;
            color: #fff;
        }
        .categories li.active {
            font-weight: bold;
        }
        .service-card > .description {
            height: 105px;
        }
        .visible-ratings {
            padding-right: 5px;
        }
        .rate-up, .rate-down {
            display: block;
            cursor: pointer;
            height: 10px;
            width: 17px;
            background: url('/img/arrows-sprite.png');
        }
        .rate-down {
            margin-top: 3px;
            background-position-y: -10px;
        }
        .rated-positive .rate-up,
        .rated-positive .rate-down {
            background-position-x: -17px;
        }
        .rated-negative .rate-up,
        .rated-negative .rate-down {
            background-position-x: -34px;
        }
    </style>
</head>
<body>
    <!--header-->
    <div class="header">
        <nav id="main_menu" class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!--toggle-->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!--logo-->
                    <div class="logo">
                        <a href="/">
                            @if(App::environment('production'))
                                <img src="http://assets.saashub.io/logo.png" />
                            @else
                                <img src="/img/logo.png" />
                            @endif
                        </a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav pull-right">
                        <li
                                @if(strstr(Route::current()->getUri(), 'browse'))
                                class="active"
                                @endif
                                ><a href="/browse">Browse</a></li>
                        <li
                            @if(Route::current()->getUri() == 'contact')
                                class="active"
                            @endif
                        ><a href="/contact">Recommend a service</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--//header-->

    @yield('content')

    <!-- footer-->
    <div id="footer2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        SaaSHub
                        &copy;
                        {{ \Carbon\Carbon::now()->format('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- up to top -->
    <a href="#"><i class="go-top fa fa-angle-double-up"></i></a>
    <!--//end-->

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.touchSwipe.min.js"></script>
    <script src="/js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
    @yield('includeJs')
    <script type="text/javascript">
        @yield('js')

        // https://github.com/customd/jquery-number
        !function(e){"use strict";function t(e,t){if(this.createTextRange){var a=this.createTextRange();a.collapse(!0),a.moveStart("character",e),a.moveEnd("character",t-e),a.select()}else this.setSelectionRange&&(this.focus(),this.setSelectionRange(e,t))}function a(e){var t=this.value.length;if(e="start"==e.toLowerCase()?"Start":"End",document.selection){var a,i,n,l=document.selection.createRange();return a=l.duplicate(),a.expand("textedit"),a.setEndPoint("EndToEnd",l),i=a.text.length-l.text.length,n=i+l.text.length,"Start"==e?i:n}return"undefined"!=typeof this["selection"+e]&&(t=this["selection"+e]),t}var i={codes:{46:127,188:44,109:45,190:46,191:47,192:96,220:92,222:39,221:93,219:91,173:45,187:61,186:59,189:45,110:46},shifts:{96:"~",49:"!",50:"@",51:"#",52:"$",53:"%",54:"^",55:"&",56:"*",57:"(",48:")",45:"_",61:"+",91:"{",93:"}",92:"|",59:":",39:'"',44:"<",46:">",47:"?"}};e.fn.number=function(n,l,s,r){r="undefined"==typeof r?",":r,s="undefined"==typeof s?".":s,l="undefined"==typeof l?0:l;var u="\\u"+("0000"+s.charCodeAt(0).toString(16)).slice(-4),h=new RegExp("[^"+u+"0-9]","g"),o=new RegExp(u,"g");return n===!0?this.is("input:text")?this.on({"keydown.format":function(n){var u=e(this),h=u.data("numFormat"),o=n.keyCode?n.keyCode:n.which,c="",v=a.apply(this,["start"]),d=a.apply(this,["end"]),p="",f=!1;if(i.codes.hasOwnProperty(o)&&(o=i.codes[o]),!n.shiftKey&&o>=65&&90>=o?o+=32:!n.shiftKey&&o>=69&&105>=o?o-=48:n.shiftKey&&i.shifts.hasOwnProperty(o)&&(c=i.shifts[o]),""==c&&(c=String.fromCharCode(o)),8!=o&&45!=o&&127!=o&&c!=s&&!c.match(/[0-9]/)){var g=n.keyCode?n.keyCode:n.which;if(46==g||8==g||127==g||9==g||27==g||13==g||(65==g||82==g||80==g||83==g||70==g||72==g||66==g||74==g||84==g||90==g||61==g||173==g||48==g)&&(n.ctrlKey||n.metaKey)===!0||(86==g||67==g||88==g)&&(n.ctrlKey||n.metaKey)===!0||g>=35&&39>=g||g>=112&&123>=g)return;return n.preventDefault(),!1}if(0==v&&d==this.value.length?8==o?(v=d=1,this.value="",h.init=l>0?-1:0,h.c=l>0?-(l+1):0,t.apply(this,[0,0])):c==s?(v=d=1,this.value="0"+s+new Array(l+1).join("0"),h.init=l>0?1:0,h.c=l>0?-(l+1):0):45==o?(v=d=2,this.value="-0"+s+new Array(l+1).join("0"),h.init=l>0?1:0,h.c=l>0?-(l+1):0,t.apply(this,[2,2])):(h.init=l>0?-1:0,h.c=l>0?-l:0):h.c=d-this.value.length,h.isPartialSelection=v==d?!1:!0,l>0&&c==s&&v==this.value.length-l-1)h.c++,h.init=Math.max(0,h.init),n.preventDefault(),f=this.value.length+h.c;else if(45!=o||0==v&&0!=this.value.indexOf("-"))if(c==s)h.init=Math.max(0,h.init),n.preventDefault();else if(l>0&&127==o&&v==this.value.length-l-1)n.preventDefault();else if(l>0&&8==o&&v==this.value.length-l)n.preventDefault(),h.c--,f=this.value.length+h.c;else if(l>0&&127==o&&v>this.value.length-l-1){if(""===this.value)return;"0"!=this.value.slice(v,v+1)&&(p=this.value.slice(0,v)+"0"+this.value.slice(v+1),u.val(p)),n.preventDefault(),f=this.value.length+h.c}else if(l>0&&8==o&&v>this.value.length-l){if(""===this.value)return;"0"!=this.value.slice(v-1,v)&&(p=this.value.slice(0,v-1)+"0"+this.value.slice(v),u.val(p)),n.preventDefault(),h.c--,f=this.value.length+h.c}else 127==o&&this.value.slice(v,v+1)==r?n.preventDefault():8==o&&this.value.slice(v-1,v)==r?(n.preventDefault(),h.c--,f=this.value.length+h.c):l>0&&v==d&&this.value.length>l+1&&v>this.value.length-l-1&&isFinite(+c)&&!n.metaKey&&!n.ctrlKey&&!n.altKey&&1===c.length&&(p=d===this.value.length?this.value.slice(0,v-1):this.value.slice(0,v)+this.value.slice(v+1),this.value=p,f=v);else n.preventDefault();f!==!1&&t.apply(this,[f,f]),u.data("numFormat",h)},"keyup.format":function(i){var n,s=e(this),r=s.data("numFormat"),u=i.keyCode?i.keyCode:i.which,h=a.apply(this,["start"]),o=a.apply(this,["end"]);0!==h||0!==o||189!==u&&109!==u||(s.val("-"+s.val()),h=1,r.c=1-this.value.length,r.init=1,s.data("numFormat",r),n=this.value.length+r.c,t.apply(this,[n,n])),""===this.value||(48>u||u>57)&&(96>u||u>105)&&8!==u&&46!==u&&110!==u||(s.val(s.val()),l>0&&(r.init<1?(h=this.value.length-l-(r.init<0?1:0),r.c=h-this.value.length,r.init=1,s.data("numFormat",r)):h>this.value.length-l&&8!=u&&(r.c++,s.data("numFormat",r))),46!=u||r.isPartialSelection||(r.c++,s.data("numFormat",r)),n=this.value.length+r.c,t.apply(this,[n,n]))},"paste.format":function(t){var a=e(this),i=t.originalEvent,n=null;return window.clipboardData&&window.clipboardData.getData?n=window.clipboardData.getData("Text"):i.clipboardData&&i.clipboardData.getData&&(n=i.clipboardData.getData("text/plain")),a.val(n),t.preventDefault(),!1}}).each(function(){var t=e(this).data("numFormat",{c:-(l+1),decimals:l,thousands_sep:r,dec_point:s,regex_dec_num:h,regex_dec:o,init:this.value.indexOf(".")?!0:!1});""!==this.value&&t.val(t.val())}):this.each(function(){var t=e(this),a=+t.text().replace(h,"").replace(o,".");t.number(isFinite(a)?+a:0,l,s,r)}):this.text(e.number.apply(window,arguments))};var n=null,l=null;e.isPlainObject(e.valHooks.text)?(e.isFunction(e.valHooks.text.get)&&(n=e.valHooks.text.get),e.isFunction(e.valHooks.text.set)&&(l=e.valHooks.text.set)):e.valHooks.text={},e.valHooks.text.get=function(t){var a,i=e(t),l=i.data("numFormat");return l?""===t.value?"":(a=+t.value.replace(l.regex_dec_num,"").replace(l.regex_dec,"."),(0===t.value.indexOf("-")?"-":"")+(isFinite(a)?a:0)):e.isFunction(n)?n(t):void 0},e.valHooks.text.set=function(t,a){var i=e(t),n=i.data("numFormat");if(n){var s=e.number(a,n.decimals,n.dec_point,n.thousands_sep);return e.isFunction(l)?l(t,s):t.value=s}return e.isFunction(l)?l(t,a):void 0},e.number=function(e,t,a,i){i="undefined"==typeof i?"1000"!==new Number(1e3).toLocaleString()?new Number(1e3).toLocaleString().charAt(1):"":i,a="undefined"==typeof a?new Number(.1).toLocaleString().charAt(1):a,t=isFinite(+t)?Math.abs(t):0;var n="\\u"+("0000"+a.charCodeAt(0).toString(16)).slice(-4),l="\\u"+("0000"+i.charCodeAt(0).toString(16)).slice(-4);e=(e+"").replace(".",a).replace(new RegExp(l,"g"),"").replace(new RegExp(n,"g"),".").replace(new RegExp("[^0-9+-Ee.]","g"),"");var s=isFinite(+e)?+e:0,r="",u=function(e,t){return""+ +(Math.round((""+e).indexOf("e")>0?e:e+"e+"+t)+"e-"+t)};return r=(t?u(s,t):""+Math.round(s)).split("."),r[0].length>3&&(r[0]=r[0].replace(/\B(?=(?:\d{3})+(?!\d))/g,i)),(r[1]||"").length<t&&(r[1]=r[1]||"",r[1]+=new Array(t-r[1].length+1).join("0")),r.join(a)}}(jQuery);

        function updateCounts(container, isPositiveRating) {
            var positiveRatings = $('.positive-ratings', container),
                negativeRatings = $('.negative-ratings', container),
                positiveRatingCount = parseInt(positiveRatings.html().replace(/\D/g,'')),
                negativeRatingCount = parseInt(negativeRatings.html().replace(/\D/g,'')),
                hadPositiveRating = $('.rated-positive', container).length > 0,
                hadNegativeRating = $('.rated-negative', container).length > 0;

            if (isPositiveRating) {
                positiveRatingCount += 1;
            } else {
                negativeRatingCount += 1;
            }

            if (hadPositiveRating) {
                positiveRatingCount -= 1;
            } else if (hadNegativeRating) {
                negativeRatingCount -= 1;
            }

            positiveRatings.html(positiveRatingCount+'');
            negativeRatings.html(negativeRatingCount+'');
        }

        $('.rate-down,.rate-up').click(function () {
            var ratingType = 'positive',
                serviceId = $(this).closest('.rating-section').data('serviceid'),
                ratingContainer = $(this).parents('tr'),
                up = $('.rate-up', ratingContainer),
                down = $('.rate-down', ratingContainer);

            if ($(this).hasClass('rate-down')) {
                ratingType = 'negative';
            }

            // do nothing if already rated
            if (ratingType == 'positive' && up.hasClass('rated-positive')) {
                return;
            } else if (ratingType == 'negative' && up.hasClass('rated-negative')) {
                return;
            }

            updateCounts(ratingContainer, ratingType == 'positive');

            if (ratingType == 'positive') {
                up.parent().addClass('rated-positive').removeClass('rated-negative');
            } else {
                up.parent().addClass('rated-negative').removeClass('rated-positive');
            }

            $.post('/service/'+serviceId+'/'+ratingType, {
                '_token': '{{ csrf_token() }}'
            });
        });
    </script>
</body>
</html>