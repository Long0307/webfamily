<style>
    * {
        margin: 0;
        padding: 0
    }
    
    #content label {
        font-weight: normal
    }
    
    #menu-erea {
        overflow: hidden
    }
    
    #menu-erea .left {
        float: left;
        width: 30%;
    }
    
    #menu-erea .right {
        float: right;
        width: 68%;
        min-height: 500px
    }
    
    .dd-item .info {
        padding: 10px
    }
    
    .dd-item>.hide {
        display: none
    }
    
    .dd {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        width: 600px;
        list-style: none;
        font-size: 13px;
        line-height: 20px;
    }
    
    .dd-list {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    
    .dd-list .dd-list {
        padding-left: 30px;
    }
    
    .dd-collapsed .dd-list {
        display: none;
    }
    
    .dd-item,
    .dd-empty,
    .dd-placeholder {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        min-height: 20px;
        font-size: 13px;
        line-height: 20px;
    }
    
    .dd-handle {
        display: block;
        margin: 5px 0;
        padding: 5px 10px;
        color: #333;
        text-decoration: none;
        border: 1px solid #ccc;
        background: #fafafa;
    }
    
    li.dd-item a.explane {
        position: absolute;
        right: 5px;
        top: 5px
    }
    
    .dd-handle:hover {
        color: #2ea8e5;
        background: #fff;
    }
    
    .dd-item>button {
        display: block;
        position: relative;
        cursor: pointer;
        float: left;
        width: 25px;
        height: 20px;
        margin: 5px 0;
        padding: 0;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        border: 0;
        background: transparent;
        font-size: 12px;
        line-height: 1;
        text-align: center;
        font-weight: bold;
    }
    
    .dd-item>button:before {
        content: '+';
        display: block;
        position: absolute;
        width: 100%;
        text-align: center;
        text-indent: 0;
    }
    
    .dd-item>button[data-action="collapse"]:before {
        content: '-';
    }
    
    .dd-placeholder,
    .dd-empty {
        margin: 5px 0;
        padding: 0;
        min-height: 30px;
        background: #f2fbff;
        border: 1px dashed #b6bcbf;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    
    .dd-empty {
        border: 1px dashed #bbb;
        min-height: 100px;
        background-color: #e5e5e5;
        background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-size: 60px 60px;
        background-position: 0 0, 30px 30px;
    }
    
    .dd-dragel {
        position: absolute;
        pointer-events: none;
        z-index: 9999;
    }
    
    .dd-dragel>.dd-item .dd-handle {
        margin-top: 0;
    }
    
    .dd-dragel .dd-handle {
        -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
        box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
    }
    /**
 * Nestable Extras
 */
    
    .nestable-lists {
        display: block;
        clear: both;
        padding: 30px 0;
        width: 100%;
        border: 0;
        border-top: 2px solid #ddd;
        border-bottom: 2px solid #ddd;
    }
    
    #nestable-menu {
        padding: 0;
        margin: 20px 0;
    }
    
    #nestable-output,
    #nestable2-output {
        width: 100%;
        height: 7em;
        font-size: 0.75em;
        line-height: 1.333333em;
        font-family: Consolas, monospace;
        padding: 5px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    
    #nestable2 .dd-handle {
        color: #fff;
        border: 1px solid #999;
        background: #bbb;
        background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
        background: -moz-linear-gradient(top, #bbb 0%, #999 100%);
        background: linear-gradient(top, #bbb 0%, #999 100%);
    }
    
    #nestable2 .dd-handle:hover {
        background: #bbb;
    }
    
    #nestable2 .dd-item>button:before {
        color: #fff;
    }
    
    @media only screen and (min-width: 700px) {
        .dd {
            width: 95%;
        }
        .dd+.dd {
            margin-left: 2%;
        }
    }
    
    .dd-hover>.dd-handle {
        background: #2ea8e5 !important;
    }
    /**
 * Nestable Draggable Handles
 */
    
    .dd3-content {
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px 5px 40px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    
    .dd3-content:hover {
        color: #2ea8e5;
        background: #fff;
    }
    
    .dd-dragel>.dd3-item>.dd3-content {
        margin: 0;
    }
    
    .dd3-item>button {
        margin-left: 30px;
    }
    
    .dd3-handle {
        position: absolute;
        margin: 0;
        left: 0;
        top: 0;
        cursor: pointer;
        width: 30px;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        border: 1px solid #aaa;
        background: #ddd;
        background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: linear-gradient(top, #ddd 0%, #bbb 100%);
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    
    .dd3-handle:before {
        content: '=';
        display: block;
        position: absolute;
        left: 0;
        top: 3px;
        width: 100%;
        text-align: center;
        text-indent: 0;
        color: #fff;
        font-size: 20px;
        font-weight: normal;
    }
    
    .dd3-handle:hover {
        background: #ddd;
    }
    
    #menu-erea #menu_area {
        margin: 20px auto
    }
    
    #menu-erea .panel-default {
        border: 1px solid #ccc;
        margin-top: 20px;
        border-radius: 0px;
    }
    
    #menu-erea .panel-heading {
        border-radius: 0px;
        background: #fff;
        color: #333;
        border-bottom: 1px solid #ccc;
        padding: 0px;
    }
    
    #menu-erea .panel-title a {
        padding: 10px;
        background: #f5f5f5;
        display: block;
        line-height: 21px;
    }
    
    #menu-erea .panel-title a.collapsed {
        background: #fff;
    }
    
    #menu-erea .panel-title a:hover.collapsed {
        background: #f5f5f5;
    }
    
    #menu-erea .dd-item .info {
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-border-radius: 4px
    }
    
    #menu-erea .dd-handle {
        border-radius: 4px;
        -webkit-border-radius: 4px
    }
    
    #menu-erea .dd-item .info .remove {
        color: red
    }
    
    #menu-erea #menu_area a {
        text-decoration: none;
    }
    
    #menu-erea .data-block {
        max-height: 350px;
        overflow: auto;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }
    
    #menu-erea .data-block li {
        list-style: none
    }
    
    #menu-erea .data-block ul {
        padding-left: 0px
    }
    
    #menu-erea .data-block {
        padding: 10px
    }
    
    #menu-erea .data-block .data-title {
        color: #003A88;
        margin-bottom: 10px
    }
    
    #menu-erea .data-block .add-to-menu,
    .add-to-menu_custom {
        background: #003A88;
        text-decoration: none;
        padding: 5px;
        border-radius: 4px;
        -webkit-border-radius: 4px;
        color: #fff;
        display: inline-block;
        margin-top: 15px
    }
    
    .data-block input[type='text'] {
        border: 1px solid #ccc
    }
    
    #menu-erea .dd-handle:hover {
        cursor: move
    }
    
    #menu_area input {
        padding: 5px
    }
    
    .data-block input[type='checkbox'] {
        margin-right: 10px
    }
    
    .data-block ul>li {
        margin-bottom: 5px
    }
    
    .data-block>div>p {
        margin-bottom: 10px
    }
    
    .data-block>div>p>label {
        min-width: 35px;
        display: inline-block
    }
    
    .data-block input[type="text"] {
        padding: 5px
    }
    
    .info .type {
        text-transform: capitalize
    }
    
    .sub-menu-content>div {
        margin-bottom: 10px
    }
    
    .sub-menu-content>div>p {
        margin-bottom: 10px
    }
    
    .sub-menu-content>p>strong {
        display: block;
        padding-bottom: 10px
    }
    
    .input-item {
        margin-bottom: 10px
    }
    
    #menu-erea label {
        font-weight: normal
    }
    
    #menu_area label {
        min-width: 30px;
        padding-right: 5px
    }
    
    .row-title {
        padding: 5px 10px;
        border: 1px solid #ccc;
        background: #e8e8e8;
        margin-bottom: 10px
    }
    
    .panel-heading {
        overflow: hidden
    }
    
    .panel-heading>a {
        float: right
    }
    
    .panel-default>.panel-heading+.panel-collapse>.panel-body {
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0px;
    }
    
    @import url(//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,greek-ext,vietnamese);
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Roboto';
        font-size: 12px;
        color: #666666;
        text-rendering: optimizeLegibility;
    }
    
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        margin-top: 0;
    }
    
    .page-header {
        vertical-align: middle;
        margin: 15px 0;
        padding: 0;
        border-bottom: none;
    }
    
    .page-header h1 {
        font-family: 'Roboto';
        font-weight: 400;
        font-size: 30px;
        color: #848484;
        display: inline-block;
        margin-bottom: 15px;
    }
    
    .breadcrumb {
        display: inline-block;
        background: none;
        margin: 0;
        padding: 0 10px;
    }
    
    .breadcrumb li a {
        color: #999999;
        font-size: 11px;
        padding: 0px;
        margin: 0px;
    }
    
    .breadcrumb li:last-child a {
        color: #1e91cf;
    }
    
    .breadcrumb li a:hover {
        text-decoration: none;
    }
    
    .breadcrumb li+li:before {
        content: "/";
        font-family: FontAwesome;
        color: #BBBBBB;
        padding: 0 5px;
    }
    
    a:hover,
    a:focus {
        text-decoration: none;
    }
    
    .input-group .captcha-image {
        position: absolute;
        right: 0px;
        z-index: 99;
        font-size: 16px;
        background: #FFF;
        border: none;
        outline: none;
        color: #555;
        outline: 0px;
        height: 42px;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    /* fix for bootstrap hidden and visible */
    
    span.hidden-xs,
    span.hidden-sm,
    span.hidden-md,
    span.hidden-lg {
        display: inline;
    }
    
    #container {
        min-height: 100%;
        width: 100%;
        position: relative;
        background: #f9f9f9;
    }
    
    .container-fluid {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    #header {
        min-height: 0px;
        background: #3498db;
        margin: 0;
        padding: 0;
        border-bottom: 1px solid #ccc;
    }
    
    #header .nav>li {
        float: left;
    }
    
    #header .nav>li li {
        min-width: 200px;
    }
    
    #header .navbar-header {
        width: 235px;
        min-height: 44px;
        padding: 0;
        background: #2980b9;
    }
    /* Navigation */
    
    .navigation-title {
        border-bottom: 2px solid #45BBBF;
        margin-bottom: 30px;
        font-size: 20px;
        text-transform: uppercase;
        color: #8CD3D6;
        font-weight: 500;
    }
    
    .navigation-link {
        text-align: center;
        text-align: -webkit-center;
        text-align: -moz-center;
        margin-bottom: 30px;
    }
    
    .navigation-link img {
        width: 60%;
        padding-bottom: 5px;
    }
    
    .navigation-link a {
        font-size: 14px;
        display: block;
    }
    
    .navigation-link ul {
        overflow: auto;
        height: 212px;
        padding: 0;
    }
    
    .navigation-link ul li {
        border-bottom: 1px solid #C1C1C1;
        padding: 6px;
    }
    
    .navigation-link ul li:hover {
        background-color: #f5f5f5;
    }
    
    .navigation-link ul li a {
        padding: 6px;
    }
    
    .navigation-link ul li:last-child {
        border-bottom: none;
    }
    
    .navigation-link ul li a i {
        margin-right: 5px;
    }
    /* Mobile */
    
    @media (max-width: 767px) {
        #header .navbar-header {
            margin-right: 0px;
            margin-left: 0px;
            float: left;
        }
    }
    
    #header #button-menu+.navbar-brand {
        margin-right: 10px;
        height: auto;
        padding: 13px 0px 0px 0px;
        margin: 0px;
        display: inline-block;
        float: none;
    }
    
    @media (max-width: 767px) {
        #header .navbar-header {
            width: 100%;
        }
        #button-menu {
            display: none;
        }
    }
    
    #header .navbar-brand .logo {
        font-family: 'OpenSans';
        font-weight: bold;
        font-size: 26px;
    }
    
    #header .navbar-brand .logo span:first-child {
        background: #fff;
        color: #2980b9;
        padding: 4px 0px 4px 10px;
    }
    
    #header .navbar-brand .logo span:last-child {
        color: #fff;
        padding: 0px 2px;
    }
    
    #header .nav>li>a {
        padding: 3px 16px;
        line-height: 38px;
        cursor: pointer;
        color: #FFF;
        border-left: 1px solid #E1E1E1;
    }
    
    #header .nav>li>a:hover {
        background: #2980b9;
    }
    
    #header .nav>li.open>a {
        background: #2980b9;
    }
    
    #header .nav>li>a>.label {
        text-shadow: none;
        padding: 1px 4px;
        position: absolute;
        top: 8px;
        left: 6px;
    }
    
    #button-menu {
        padding: 10px 17px 9px 17px;
        line-height: 25px;
        display: inline-block;
        cursor: pointer;
        color: #FFF;
        border-left: 1px solid #E1E1E1;
        float: right;
    }
    
    #profile {
        display: none;
    }
    
    #column-left.active #profile {
        display: block;
        padding: 10px 15px 10px 15px;
        overflow: auto;
        border-bottom: 1px solid #ccc;
        background: #fff;
    }
    
    #profile div {
        float: left;
        color: #C4C4C4;
    }
    
    #profile div i {
        font-size: 42px;
        color: #2ca5d3;
    }
    
    #profile div+div {
        margin-left: 15px;
    }
    
    #profile h4 {
        margin-top: 6px;
        font-family: 'Roboto';
        font-size: 15px;
        font-weight: 400;
        color: #16191c;
        margin-bottom: 0;
    }
    
    #column-left {
        width: 50px;
        height: 100%;
        background-color: #e8ebf2;
        border-right: 2px solid #ccc;
        position: absolute;
        top: 0px;
        padding-top: 47px;
        z-index: 10;
        transition: all 0.3s;
    }
    
    #column-left .mCustomScrollBox,
    #column-left .mCSB_container {
        overflow: initial;
    }
    
    #column-left.active {
        width: 235px;
        display: block;
    }
    
    #column-left.active .mCustomScrollBox,
    #column-left.active .mCSB_container {
        overflow: hidden;
    }
    
    #content {
        padding-bottom: 40px;
        transition: all 0.3s;
    }
    
    #column-left+#content {
        margin-left: 50px;
    }
    
    #column-left+#content+#admin-footer {
        margin-left: 50px;
    }
    /* Mobile */
    
    @media (max-width: 767px) {
        #column-left {
            overflow: hidden;
            display: none;
        }
        #column-left+#content {
            margin-left: 0;
        }
        #column-left+#content+#admin-footer {
            margin-left: 0;
        }
    }
    /* Menu */
    
    #menu,
    #menu ul,
    #menu li {
        padding: 0;
        margin: 0;
        list-style: none;
    }
    
    #menu {
        margin-bottom: 25px;
    }
    
    #menu>li {
        position: relative;
    }
    
    #menu li a {
        text-decoration: none;
        display: block;
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid #ccc;
    }
    
    #menu li a i {
        font-size: 16px;
    }
    
    #menu>li>a {
        color: #16191c;
        font-size: 14px;
        padding-left: 13px;
        border-bottom: 1px solid #ccc;
    }
    
    #menu>li>a:hover {
        background-color: #dbdee5;
    }
    
    #menu>li>a>span {
        display: none;
        margin-left: 8px;
    }
    
    #menu li li a {
        color: #16191c;
    }
    
    #menu li li a:hover {
        color: #16191c;
        background-color: #dbdee5;
    }
    
    #menu li li a:before {
        content: "\f101";
        font-size: 14px;
        font-family: FontAwesome;
        margin-left: 10px;
        margin-right: 10px;
        transition: margin ease 0.5s;
    }
    
    #menu li li a:hover:before {
        margin-right: 20px;
    }
    
    #menu>li.active>a {
        color: #FFF;
        background: #3498db;
    }
    
    #menu li.active li a {
        color: #16191c;
    }
    
    #menu li li.active>a:last-child {
        color: #000;
        font-weight: bold;
    }
    
    #menu li li.active a:last-child:before {
        margin-left: 20px;
        margin-right: 10px;
    }
    
    #menu>li>ul {
        position: absolute;
        left: 50px;
        top: 0px;
        width: 210px;
        background-color: #e8ebf2;
        visibility: hidden;
    }
    
    #menu li ul {
        overflow: hidden;
    }
    
    #menu>li:hover>ul {
        visibility: visible;
    }
    
    #menu li li a.parent:after,
    #column-left.active #menu>li a.parent:after {
        font-family: FontAwesome;
        content: "\f105";
        float: right;
        margin-right: 8px;
    }
    
    #menu li li.open>a.parent:after,
    #column-left.active #menu>li.open>a.parent:after {
        font-family: FontAwesome;
        content: "\f107";
        float: right;
        margin-right: 8px;
    }
    
    #menu li ul a {
        padding-left: 20px;
    }
    
    #menu li li ul a {
        padding-left: 40px;
    }
    
    #menu li li li ul a {
        padding-left: 60px;
    }
    
    #menu li li li li ul a {
        padding-left: 80px;
    }
    /* Menu Active */
    /* Desktop */
    
    @media (min-width: 768px) {
        #column-left.active {
            overflow: auto;
        }
        #column-left.active+#content {
            margin-left: 235px;
        }
        #column-left.active+#content+#admin-footer {
            margin-left: 235px;
        }
    }
    /* Mobile */
    
    @media (max-width: 767px) {
        #column-left.active+#content {
            position: relative;
            left: 235px;
        }
        #column-left.active+#content+#admin-footer {
            position: relative;
            left: 235px;
        }
    }
    
    #column-left.active {
        width: 235px;
    }
    
    #column-left.active #menu li i {
        font-size: 14px;
    }
    
    #column-left.active #menu>li>a>span {
        display: inline;
    }
    
    #column-left.active #menu>li>ul {
        position: relative;
        left: auto;
        top: auto;
        width: auto;
        visibility: visible;
    }
    /* footer */
    
    #admin-footer {
        text-align: center;
        padding-bottom: 50px;
    }
    
    .fixed-bottom {
        height: 45px;
        background: #35a0fb;
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: 111;
        width: 100%;
        font-size: 16px;
    }
    
    .fixed-bottom .list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .fixed-bottom .item-content {
        float: left;
        width: 30%;
        text-align: center;
        color: #FFF;
        min-height: 45px;
        line-height: 45px;
        text-transform: uppercase;
    }
    
    .fixed-bottom .item-content * {
        display: inline-block;
    }
    
    .fixed-bottom .item-content .item-title {
        font-weight: bold;
    }
    
    .fixed-bottom .item-content:nth-child(1) {
        width: 35%;
        padding-left: 5%;
    }
    
    .fixed-bottom .item-content:nth-child(2) {
        background: linear-gradient(-60deg, #1a83dc 90%, #35a0fb 50%) no-repeat;
    }
    
    .fixed-bottom .item-content:nth-child(3) {
        width: 35%;
        padding-right: 5%;
        background: linear-gradient(-60deg, #0f6cbb 90%, #1a83dc 50%) no-repeat;
    }
    
    @media (max-width: 767px) {
        .fixed-bottom .item-content .item-title {
            display: none;
        }
    }
    /* Navs */
    
    .nav>li.disabled>a {
        color: #999;
    }
    
    .nav>li.disabled>a:hover,
    .nav>li.disabled>a:focus {
        color: #999;
    }
    /* Tabs */
    
    .nav-tabs>li>a {
        color: #666;
        border-radius: 2px 2px 0 0;
    }
    
    .nav-tabs>li>a:hover {
        border-color: #eee #eee #ddd;
    }
    
    .nav-tabs {
        margin-bottom: 25px;
    }
    
    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:hover,
    .nav-tabs>li.active>a:focus {
        font-weight: bold;
        color: #333;
    }
    
    .tabs-left,
    .tabs-right {
        border-bottom: none;
        padding-top: 2px;
    }
    
    .tabs-left {
        border-right: 1px solid #ddd;
    }
    
    .tabs-right {
        border-left: 1px solid #ddd;
    }
    
    .tabs-left>li,
    .tabs-right>li {
        float: none;
        margin-bottom: 2px;
    }
    
    .tabs-left>li {
        margin-right: -1px;
    }
    
    .tabs-right>li {
        margin-left: -1px;
    }
    
    .tabs-left>li.active>a,
    .tabs-left>li.active>a:hover,
    .tabs-left>li.active>a:focus {
        border-bottom-color: #ddd;
        border-right-color: transparent;
    }
    
    .tabs-right>li.active>a,
    .tabs-right>li.active>a:hover,
    .tabs-right>li.active>a:focus {
        border-bottom: 1px solid #ddd;
        border-left-color: transparent;
    }
    
    .tabs-left>li>a {
        border-radius: 4px 0 0 4px;
        margin-right: 0;
        display: block;
    }
    
    .tabs-right>li>a {
        border-radius: 0 4px 4px 0;
        margin-right: 0;
    }
    
    .sideways {
        margin-top: 50px;
        border: none;
        position: relative;
    }
    
    .sideways>li {
        height: 20px;
        width: 120px;
        margin-bottom: 100px;
    }
    
    .sideways>li>a {
        border-bottom: 1px solid #ddd;
        border-right-color: transparent;
        text-align: center;
        border-radius: 4px 4px 0px 0px;
    }
    
    .sideways>li.active>a,
    .sideways>li.active>a:hover,
    .sideways>li.active>a:focus {
        border-bottom-color: transparent;
        border-right-color: #ddd;
        border-left-color: #ddd;
    }
    
    .sideways.tabs-left {
        left: -50px;
    }
    
    .sideways.tabs-right {
        right: -50px;
    }
    
    .sideways.tabs-right>li {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    
    .sideways.tabs-left>li {
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }
    
    .form-control:hover {
        border: 1px solid #b9b9b9;
        border-top-color: #a0a0a0;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
    }
    
    div.required .control-label:not(span):before,
    td.required:before {
        content: '* ';
        color: #F00;
        font-weight: bold;
    }
    
    .table thead td span[data-toggle="tooltip"]:after,
    label.control-label span:after {
        font-family: FontAwesome;
        color: #1E91CF;
        content: "\f059";
        margin-left: 4px;
    }
    
    fieldset legend {
        padding-bottom: 5px;
    }
    
    input[type="radio"],
    input[type="checkbox"] {
        margin: 2px 0 0;
    }
    
    .radio,
    .checkbox {
        min-height: 18px;
    }
    
    input[type="radio"],
    .radio input[type="radio"],
    .radio-inline input[type="radio"],
    input[type="checkbox"],
    .checkbox input[type="checkbox"],
    .checkbox-inline input[type="checkbox"] {
        position: relative;
        width: 13px;
        width: 16px \0;
        height: 13px;
        height: 16px \0;
        -webkit-appearance: none;
        background: white;
        border: 1px solid #dcdcdc;
        border: 1px solid transparent \0;
        border-radius: 1px;
    }
    
    input[type="radio"]:focus,
    .radio input[type="radio"]:focus,
    .radio-inline input[type="radio"]:focus,
    input[type="checkbox"]:focus,
    .checkbox input[type="checkbox"]:focus,
    .checkbox-inline input[type="checkbox"]:focus {
        border-color: #4d90fe;
        outline: 0;
    }
    
    input[type="radio"]:active,
    .radio input[type="radio"]:active,
    .radio-inline input[type="radio"]:active,
    input[type="checkbox"]:active,
    .checkbox input[type="checkbox"]:active,
    .checkbox-inline input[type="checkbox"]:active {
        background-color: #ebebeb;
        border-color: #c6c6c6;
    }
    
    input[type="radio"]:checked,
    .radio input[type="radio"]:checked,
    .radio-inline input[type="radio"]:checked,
    input[type="checkbox"]:checked,
    .checkbox input[type="checkbox"]:checked,
    .checkbox-inline input[type="checkbox"]:checked {
        background: #fff;
    }
    
    input[type="radio"],
    .radio input[type="radio"],
    .radio-inline input[type="radio"] {
        width: 15px;
        width: 18px \0;
        height: 15px;
        height: 18px \0;
        border-radius: 1em;
    }
    
    input[type="radio"]:checked::after,
    .radio input[type="radio"]:checked::after,
    .radio-inline input[type="radio"]:checked::after {
        position: relative;
        top: 3px;
        left: 3px;
        display: block;
        width: 7px;
        height: 7px;
        content: '';
        background: #666;
        border-radius: 1em;
    }
    
    input[type="checkbox"]:hover,
    .checkbox input[type="checkbox"]:hover,
    .checkbox-inline input[type="checkbox"]:hover {
        border-color: #c6c6c6;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
        -webkit-box-shadow: none \9;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
        box-shadow: none \9;
    }
    
    input[type="checkbox"]:checked::after,
    .checkbox input[type="checkbox"]:checked::after,
    .checkbox-inline input[type="checkbox"]:checked::after {
        position: absolute;
        top: -6px;
        left: -5px;
        display: block;
        content: url('../image/checkmark.png');
    }
    
    .table thead td {
        font-weight: bold;
    }
    
    .table thead>tr>td,
    .table tbody>tr>td {
        vertical-align: middle;
    }
    
    .table a.asc:after {
        content: " \f107";
        font-family: FontAwesome;
        font-size: 14px;
    }
    
    .table a.desc:after {
        content: " \f106";
        font-family: FontAwesome;
        font-size: 14px;
    }
    
    .table-bordered {
        border: none;
    }
    
    .table-bordered td {
        border-left: none !important;
        border-right: none !important;
        border-bottom: none !important;
        border-top: 1px solid #ddd !important;
    }
    
    .pagination {
        margin: 0;
    }
    
    .form-group {
        padding-top: 15px;
        padding-bottom: 15px;
        margin-bottom: 0;
    }
    
    .form-group+.form-group {
        border-top: 1px solid #ededed;
    }
    /* Panels */
    
    .panel {
        border-radius: 0px;
    }
    
    .panel .panel-heading {
        position: relative;
    }
    
    .panel-heading h3 i {
        margin-right: 8px;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    
    .panel-heading i {
        font-size: 16px;
        font-weight: 500;
    }
    
    .panel-heading h3 {
        font-size: 16px;
        font-weight: 500;
        display: inline-block;
    }
    /* Primary Panel */
    
    .panel-primary {
        border: 1px solid #c3e4f6;
        border-top: 2px solid #5cb7e7;
    }
    
    .panel-primary .panel-heading {
        color: #1e91cf;
        border-color: #96d0f0;
        background: white;
    }
    /* Default Panel */
    
    .panel-default {
        border: none;
        box-shadow: 2px 2px 3px #ccc;
    }
    
    .panel-default .panel-heading {
        color: #353535;
        border-color: #e8e8e8;
        background: #d0d8de;
    }
    
    .img-thumbnail i {
        color: #FFFFFF;
        background-color: #EEEEEE;
        text-align: center;
        vertical-align: middle;
        width: 100px;
        height: 100px;
        padding-top: 20px;
        vertical-align: middle;
        display: inline-block;
    }
    
    .img-thumbnail.list i {
        width: 40px;
        height: 40px;
        padding-top: 10px;
    }
    /* Tiles */
    
    .tile {
        margin-bottom: 15px;
        border-radius: 3px;
        background-color: #279FE0;
        color: #FFFFFF;
        transition: all 1s;
    }
    
    .tile:hover {
        opacity: 0.95;
    }
    
    .tile a {
        color: #FFFFFF;
    }
    
    .tile-heading {
        padding: 5px 8px;
        text-transform: uppercase;
        background-color: #1E91CF;
        color: #FFF;
    }
    
    .tile .tile-heading .pull-right {
        transition: all 1s;
        opacity: 0.7;
    }
    
    .tile:hover .tile-heading .pull-right {
        opacity: 1;
    }
    
    .tile-body {
        padding: 15px;
        color: #FFFFFF;
        line-height: 48px;
    }
    
    .tile .tile-body i {
        font-size: 50px;
        opacity: 0.3;
        transition: all 1s;
    }
    
    .tile:hover .tile-body i {
        color: #FFFFFF;
        opacity: 1;
    }
    
    .tile .tile-body h2 {
        font-size: 42px;
    }
    
    .tile-footer {
        padding: 5px 8px;
        background-color: #3DA9E3;
    }
    
    #column-left.active #stats {
        display: block;
    }
    
    #stats {
        display: none;
        border-radius: 2px;
        color: #fff;
        background: #3498db;
        margin: 15px 20px;
        padding: 5px 0;
    }
    
    #stats ul,
    #stats li {
        padding: 0;
        margin: 0;
        list-style: none;
    }
    
    #stats li {
        font-size: 11px;
        color: #fff;
        padding: 5px 10px;
        border-bottom: 1px dotted #ccc;
    }
    
    #stats div:first-child {
        margin-bottom: 4px;
    }
    
    #stats .progress {
        height: 3px;
        margin-bottom: 0;
    }
    
    .jqvmap-label {
        z-index: 999;
    }
    
    .alert {
        overflow: auto;
    }
    /* Menu Fix For System -> Layout -> Banner */
    
    .collapse.in {
        display: block;
        visibility: unset;
    }
    
    .collapse {
        display: none;
        visibility: unset;
    }
    /* Menu Fix For System -> Layout -> Banner */
    /* Website500K */
    
    #special-500k .panel-heading {
        background: #e74c3c;
        color: #FFF;
    }
    
    #info-500k .panel-heading {
        background: #3498db;
        color: #FFF;
    }
    
    #special-500k .panel-body,
    #info-500k .panel-body {
        height: 300px;
        overflow-y: auto;
    }
</style>
<!-- #Top Bar -->
<script src="../../public/Admin/templateAdmin/plugins/ckeditor/ckeditor.js"></script>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>EDIT MEGA MENU</h2>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="container">
                                <div id="menu-erea" class="panel panel-body">
                                    <div class="left">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#block-page" aria-expanded="true" class="collapsed">Pages</a>
                                                    </h4>
                                                </div>
                                                <div id="block-page" class="panel-collapse collapse in" aria-expanded="true" style="height: 120px;">
                                                    <div class="panel panel-body">
                                                        <div class="data-block">
                                                            <ul>
                                                                <li class="">
                                                                    <label></label>
                                                                    <input class="page" type="checkbox" value="6" data="Trang chủ"> Trang chủ
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pull-right"><a class="add-to-menu btn btn-primary" href="javascript:void(0);">Add to Menu</a></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#block-category" class="collapsed" aria-expanded="true">Categories</a>
                                                    </h4>
                                                </div>
                                                <div id="block-category" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel panel-body">
                                                        <div class="data-block">
                                                            <ul>
                                                                <li class="">
                                                                    <label></label>
                                                                    <input class="category" type="checkbox" value="104" data="Tất cả danh mục"> Tất cả danh mục
                                                                </li>
                                                                <li class="">
                                                                    <label>
                          <input class="category" type="checkbox" value="148" data="Đồng hồ - Phụ kiện &nbsp;&nbsp;>&nbsp;&nbsp;Đồng hồ nam ">
                          Đồng hồ - Phụ kiện &nbsp;&nbsp;&gt;&nbsp;&nbsp;Đồng hồ nam </label>
                                                                </li>
                                                                <li class="">
                                                                    <label>
                          <input class="category" type="checkbox" value="154" data="Đồng hồ - Phụ kiện &nbsp;&nbsp;>&nbsp;&nbsp;Đồng hồ nữ&nbsp;&nbsp;>&nbsp;&nbsp;Đồng hồ trời trang">
                          Đồng hồ - Phụ kiện &nbsp;&nbsp;&gt;&nbsp;&nbsp;Đồng hồ nữ&nbsp;&nbsp;&gt;&nbsp;&nbsp;Đồng hồ trời trang</label>
                                                                </li>
                                                                <li class="">
                                                                    <label>
                          <input class="category" type="checkbox" value="159" data="Đồng hồ - Phụ kiện &nbsp;&nbsp;>&nbsp;&nbsp;Phụ kiện nam&nbsp;&nbsp;>&nbsp;&nbsp;Vớ, tất">
                          Đồng hồ - Phụ kiện &nbsp;&nbsp;&gt;&nbsp;&nbsp;Phụ kiện nam&nbsp;&nbsp;&gt;&nbsp;&nbsp;Vớ, tất</label>
                                                                </li>
                                                                <li class="">
                                                                    <label>
                          <input class="category" type="checkbox" value="170" data="Thời trang&nbsp;&nbsp;>&nbsp;&nbsp;Nổi bật nhất">
                          Thời trang&nbsp;&nbsp;&gt;&nbsp;&nbsp;Nổi bật nhất</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pull-right"><a class="add-to-menu btn btn-primary" href="javascript:void(0);">Add to Menu</a></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#block-thread" class="collapsed" aria-expanded="false">Threads</a></h4>
                                                </div>
                                                <div id="block-thread" class="panel-collapse collapse" aria-expanded="false">
                                                    <div class="panel panel-body">
                                                        <div class="data-block">
                                                            <ul>
                                                                <li class="">
                                                                    <label>
                          <input class="thread" type="checkbox" value="1" data="Tin tức">
                          Tin tức</label>
                                                                </li>
                                                                <li class="">
                                                                    <label>
                          <input class="thread" type="checkbox" value="5" data="Tin tức nổi bật">
                          Tin tức nổi bật</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pull-right"><a class="add-to-menu btn btn-primary" href="javascript:void(0);">Add to Menu</a></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <form action="https://demo.website500k.com/proins/quantri/index.php?route=design/megamenu/index&amp;token=mUzBZqqam2O0GOBsEqMiwiU2W8Unzhaz" method="post" enctype="multipart/form-data" id="form">
                                            <div class="dd" id="menu_area">
                                                <ol class="dd-list">


                                                    <li class="dd-item">
                                                        <div class="dd-handle">
                                                            <div class="bar">
                                                                <span class="title">Chính sách mua hàng</span>
                                                            </div>
                                                        </div>
                                                        <div class="info" style="display: block;">
                                                            <p class="input-item">
                                                                <span class="type">Type infomation</span></p>
                                                            <p class="input-item"><label>Title </label></p>
                                                            <div class="input-group">
                                                                <input class="form-control" type="text" name="title[][1]" value="Chính sách mua hàng">
                                                                <div class="input-group-addon"><img src="https://demo.website500k.com/proins/quantri/view/image/flags/vn.png"></div>
                                                            </div>
                                                            <div class="input-group">
                                                                <input class="form-control" type="text" name="title[][2]" value="Delivery Information">
                                                                <div class="input-group-addon"><img src="https://demo.website500k.com/proins/quantri/view/image/flags/gb.png"></div>
                                                            </div>
                                                            <p class="input-item">
                                                                <a href="javascript:void(0);" class="remove" onclick="remove_item(this);"> <i class="fa fa-trash"></i> Remove</a>
                                                            </p>
                                                        </div><a href="javascript:void(0);" class="explane" onclick="explane(this)">Explane</a>
                                                    </li>

                                                </ol>
                                            </div>
                                            <input id="custom_data" type="hidden" name="custom_data" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="../../public/Admin/templateAdmin/plugins/jquery/jquery.min.js"></script>

    <script>
        function get_content_obj(obj) {
            var url = '';
            var type_id = jQuery(obj).attr('value');
            var result = "<li class='dd-item'><div class='dd-handle'>" +
                "<div class='bar'>" +
                "<span class='title'>" + jQuery(obj).attr('data') + "</span>" +
                "</div>" +
                "</div><div class='info hide'>" +
                "<p class='input-item'><span class='type'>Type " + jQuery(obj).attr('class') + "</span></p>" +
                "<p class='input-item'><label>Title</label></p>" +
                "<div class='input-group'>" +
                "<input class='form-control' type='text' name='title[][1]' value='" + jQuery(obj).attr('data') + "'  />" +
                "<div class='input-group-addon'><img src='https://demo.website500k.com/proins/quantri/view/image/flags/vn.png'/></div>" +
                "</div>" +
                "<div class='input-group'>" +
                "<input class='form-control' type='text' name='title[][2]' value='" + jQuery(obj).attr('data') + "'  />" +
                "<div class='input-group-addon'><img src='https://demo.website500k.com/proins/quantri/view/image/flags/gb.png'/></div>" +
                "</div>" +
                "<p class='input-item'><a  href='javascript:void(0);' class='remove' onclick='remove_item(this);'><i class='fa fa-trash'></i> Remove</a></p>" +
                "</div><a href='javascript:void(0);' class='explane' onclick='explane(this)'>Explane</a></li>";
            return result;
        }

        function get_content_obj_custom(obj) {
            var url = jQuery(obj).parent().parent().find('input.url').val();
            var title = jQuery(obj).parent().parent().find('input.title').val();
            var urlhtml = "<p class='input-item'><label>Url : </label><input class='form-control' type='text' name='url[]' value='" + url + "'/></p>";
            var result = "<li class='dd-item'><div class='dd-handle'>" +
                "<div class='bar'>" +
                "<span class='title'>" + title + "</span>" +
                "</div>" +
                "</div><div class='info hide'>" +
                "<p class='input-item'><span class='type'>Type Custom</span></p>" +
                "<p class='input-item'><label>Title </label></p>" +
                "<div class='input-group'>" +
                "<input class='form-control' type='text' name='title[][1]' value='" + title + "'  />" +
                "<div class='input-group-addon'><img src='https://demo.website500k.com/proins/quantri/view/image/flags/vn.png'/></div>" +
                "</div>" +
                "<div class='input-group'>" +
                "<input class='form-control' type='text' name='title[][2]' value='" + title + "'  />" +
                "<div class='input-group-addon'><img src='https://demo.website500k.com/proins/quantri/view/image/flags/gb.png'/></div>" +
                "</div>" +
                urlhtml +
                "<p class='input-item'><a  href='javascript:void(0);' class='remove' onclick='remove_item(this);'><i class='fa fa-trash'></i> Remove</a></p>" +
                "</div><a href='javascript:void(0);' class='explane' onclick='explane(this)'>Explane</a></li>";
            return result;
        }

        function cc() {
            jQuery('li.dd-item').each(function() {
                var parent = jQuery(this).parents('.dd-list')
                if (parent.length > 1) {
                    jQuery(this).find('a.activemega').hide();
                    jQuery(this).find('.sub-menu-content').hide();
                } else {
                    jQuery(this).find('a.activemega').show();
                }
            })
        }
        var updatedata = function(e) {
            check_megamenu();
        }

        function megamenuSubmit() {
            jQuery('#menu_area li.dd-item').each(function(index, e) {
                    if (jQuery(this).children('.dd-list').length > 0) {
                        var parent_id = index + 1;
                        jQuery(this).children('.dd-list').children('li.dd-item').each(function() {
                            jQuery(this).find('input.parent_id').val(parent_id);
                        })
                    }
                    $(e).children('.info').find('input, select, textarea').each(function() {
                        var name = $(this).attr('name');
                        if (typeof name != 'undefined') {
                            name = name.replace("[]", "[" + index + "]");
                            $(this).attr('name', name)
                        }
                    })
                })
                //return false;
            jQuery('#menu_area').children('.dd-list').children('li').children('.info').children('.hidden-data').children('.parent_id').val(0);
            jQuery('#form').submit();
        }

        function remove_item(obj) {
            var parent = jQuery(obj).parent().parent().parent();
            jQuery(parent).remove();
        }

        function activemega(obj) {
            if (jQuery(obj).hasClass('active') == true) {
                jQuery(obj).parent().parent().parent().children(".info").children('.sub-menu-content').show();
                jQuery(obj).parent().parent().children('.hidden-data').children('.activemega').attr('value', 1);
                jQuery(obj).html("Deactivate Mena Menu");
                jQuery(obj).removeClass('active');
            } else {
                jQuery(obj).addClass('active');
                jQuery(obj).parent().parent().parent().children(".info").children('.sub-menu-content').hide();
                jQuery(obj).parent().parent().children('.hidden-data').children('.activemega').attr('value', 0);
                jQuery(obj).html("Active Mena Menu");
            }
        }

        function add_menu(obj) {
            jQuery('.right #menu_area > ol').append(obj);
            jQuery('.mega-content-editor').summernote({
                height: 300
            });
            // Override summernotes image manager
            $('button[data-event=\'showImageDialog\']').attr('data-toggle', 'image').removeAttr('data-event');

            $(document).delegate('button[data-toggle=\'image\']', 'click', function() {
                $('#modal-image').remove();

                $(this).parents('.note-editor').find('.note-editable').focus();

                $.ajax({
                    url: 'index.php?route=common/filemanager&token=' + getURLVar('token'),
                    dataType: 'html',
                    beforeSend: function() {
                        $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
                        $('#button-image').prop('disabled', true);
                    }
                });
            });
        }

        function explane(obj) {
            if (jQuery(obj).parent().children('.info').hasClass('hide') == true) {
                jQuery(obj).parent().children('.info').show();
                jQuery(obj).parent().children('.info').removeClass('hide');
                jQuery(obj).html('Explane');
            } else {
                jQuery(obj).parent().children('.info').hide();
                jQuery(obj).parent().children('.info').addClass('hide');
                jQuery(obj).html('Collapse');
            }
        }

        function treodenSetColorPicker(obj) {
            $(obj).ColorPicker({
                onSubmit: function(hsb, hex, rgb, el) {
                    $(el).val(hex);
                    $(el).ColorPickerHide();
                },
                onBeforeShow: function() {
                    $(this).ColorPickerSetColor(this.value);
                },
                onChange: function(hsb, hex, rgb, el) {
                    $(obj).val(hex);
                    $(obj).css('background', '#' + hex);
                }
            })
        }
        jQuery(document).ready(function() {
            var id = jQuery('#menu_area').attr('auto-id');
            jQuery('a.add-to-menu').click(function() {
                var parent = jQuery(this).parent().parent().find('ul');
                console.log(parent);
                jQuery(parent).find('input').each(function() {
                    if (jQuery(this).is(':checked')) {
                        var obj = get_content_obj(this, id);
                        add_menu(obj);
                        jQuery(this).attr('checked', false)
                    }
                });
            });
            jQuery('a.add-to-menu_custom').click(function() {
                var obj = get_content_obj_custom(this);
                add_menu(obj);
            });
            jQuery('#menu_area').nestable({
                group: 1
            }).on('change', updatedata);
            check_megamenu();
            jQuery('.mega-content-editor').summernote({
                height: 300
            });
            // Override summernotes image manager
            $('button[data-event=\'showImageDialog\']').attr('data-toggle', 'image').removeAttr('data-event');

            $(document).delegate('button[data-toggle=\'image\']', 'click', function() {
                $('#modal-image').remove();

                $(this).parents('.note-editor').find('.note-editable').focus();

                $.ajax({
                    url: 'index.php?route=common/filemanager&token=' + getURLVar('token'),
                    dataType: 'html',
                    beforeSend: function() {
                        $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
                        $('#button-image').prop('disabled', true);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        var elm, range, w_select;
        setTimeout(function() {
            $(".note-toolbar .note-insert").append('<button type="button" id="shortcode-iframe" class="btn btn-default btn-sm btn-small" title="Iframe"><i class="fa fa-file-code-o" aria-hidden="true"></i></button>');
            $(".note-editor .note-dialog").append('<div class="shortcode-iframe modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close">×</button><h4 class="modal-title">Iframe</h4><small class="text-muted">[iframe src="URL" width="number" height="number" /]</small></div><form class="note-modal-form shortcode-iframe-form"><div class="modal-body"><div class="row-fluid"><div class="form-group"><label>URL</label><input type="text" name="src" class="form-control" /></div><div class="form-group"><label>Width</label> (<small class="text-muted">Only number</small>)<input type="number" name="width" class="form-control" /></div><div class="form-group"><label>Height</label> (<small class="text-muted">Only number</small>)<input type="number" name="height" class="form-control" /></div></div></div><div class="modal-footer"><button href="#" class="btn btn-primary shortcode-iframe-btn">Insert</button></div></form></div></div></div>');
            $(document).delegate("#shortcode-iframe", "click", function() {
                $(".shortcode-iframe").css({
                    "display": "block",
                    "background": "rgba(0,0,0,0.4)"
                });
                $(this).parents(".note-editor").find(".note-editable").focus();
                if (window.getSelection) {
                    elm = window.getSelection();
                    range = elm.getRangeAt(0);
                    w_select = true;
                } else {
                    elm = document.selection.createRange();
                    w_select = false;
                }
            });
            $(document).delegate(".close", "click", function() {
                $(this).parents(".shortcode-iframe").css("display", "none");
            });
            $(document).delegate(".shortcode-iframe-btn", "click", function(event) {
                $(this).parents(".shortcode-iframe").css("display", "none");
            });
            $(".shortcode-iframe-form").submit(function(event) {
                var _this = $(this);
                event.preventDefault();
                var values = {};
                $.each($(this).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                var shortcode = '[iframe ';
                for (i in values) {
                    shortcode += i + '=' + values[i] + ' ';
                }
                shortcode += '/]';
                $.ajax({
                    url: 'https://demo.website500k.com/proins/index.php?route=api/shortcodes/doShortCodes',
                    type: 'post',
                    dataType: 'text',
                    data: {
                        shortcode: shortcode
                    },
                    success: function(text) {
                        insertShortCodes(text, elm, range, w_select);
                        _this.parents(".shortcode-iframe").css("display", "none");
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        _this.parents(".shortcode-iframe").css("display", "none");
                    }
                });
            });
        }, 300);
        var elm, range, w_select;
        setTimeout(function() {
            $(".note-toolbar .note-insert").append('<button type="button" id="shortcode-loadcontroller" class="btn btn-default btn-sm btn-small" title="Load controller"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>');
            $(".note-editor .note-dialog").append('<div class="shortcode-loadcontroller modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close">×</button><h4 class="modal-title">Load controller</h4><small class="text-muted">[loadcontroller route="Opencart route" /]</small></div><form class="note-modal-form shortcode-loadcontroller-form"><div class="modal-body"><div class="row-fluid"><div class="form-group"><label>Route</label> (<small class="text-muted">Opencart route</small>)<input type="text" name="route" class="form-control" /></div></div></div><div class="modal-footer"><button href="#" class="btn btn-primary shortcode-loadcontroller-btn">Insert</button></div></form></div></div></div>');
            $(document).delegate("#shortcode-loadcontroller", "click", function() {
                $(".shortcode-loadcontroller").css({
                    "display": "block",
                    "background": "rgba(0,0,0,0.4)"
                });
                $(this).parents(".note-editor").find(".note-editable").focus();
                if (window.getSelection) {
                    elm = window.getSelection();
                    range = elm.getRangeAt(0);
                    w_select = true;
                } else {
                    elm = document.selection.createRange();
                    w_select = false;
                }
            });
            $(document).delegate(".close", "click", function() {
                $(this).parents(".shortcode-loadcontroller").css("display", "none");
            });
            $(document).delegate(".shortcode-loadcontroller-btn", "click", function(event) {
                $(this).parents(".shortcode-loadcontroller").css("display", "none");
            });
            $(".shortcode-loadcontroller-form").submit(function(event) {
                var _this = $(this);
                event.preventDefault();
                var values = {};
                $.each($(this).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                var shortcode = '[loadcontroller ';
                for (i in values) {
                    shortcode += i + '=' + values[i] + ' ';
                }
                shortcode += '/]';
                $.ajax({
                    url: 'https://demo.website500k.com/proins/index.php?route=api/shortcodes/doShortCodes',
                    type: 'post',
                    dataType: 'text',
                    data: {
                        shortcode: shortcode
                    },
                    success: function(text) {
                        insertShortCodes(text, elm, range, w_select);
                        _this.parents(".shortcode-loadcontroller").css("display", "none");
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        _this.parents(".shortcode-loadcontroller").css("display", "none");
                    }
                });
            });
        }, 300);
        var elm, range, w_select;
        setTimeout(function() {
            $(".note-toolbar .note-insert").append('<button type="button" id="shortcode-module" class="btn btn-default btn-sm btn-small" title="Load Modules"><i class="fa fa-puzzle-piece" aria-hidden="true"></i></button>');
            $(".note-editor .note-dialog").append('<div class="shortcode-module modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close">×</button><h4 class="modal-title">Load Modules</h4><small class="text-muted">[module id="number" name="string" /]</small></div><form class="note-modal-form shortcode-module-form"><div class="modal-body"><div class="row-fluid"><div class="form-group"><label>ID Module</label> (<small class="text-muted">Only number</small>)<input type="number" name="id" class="form-control" /></div><div class="form-group"><label>Name</label> (<small class="text-muted">PHP file name</small>)<select name="name" class="form-control" ><option value="account">account</option><option value="advanced_newsletter">advanced_newsletter</option><option value="affiliate">affiliate</option><option value="amazon_login">amazon_login</option><option value="amazon_pay">amazon_pay</option><option value="banner">banner</option><option value="banner_grid">banner_grid</option><option value="bestseller">bestseller</option><option value="brainyfilter">brainyfilter</option><option value="carousel">carousel</option><option value="category">category</option><option value="d_quickcheckout">d_quickcheckout</option><option value="ebay_listing">ebay_listing</option><option value="featured">featured</option><option value="filter">filter</option><option value="google_hangouts">google_hangouts</option><option value="html">html</option><option value="information">information</option><option value="latest">latest</option><option value="latest_products_brand">latest_products_brand</option><option value="latest_products_category">latest_products_category</option><option value="menu">menu</option><option value="newsletter">newsletter</option><option value="plgselectthread">plgselectthread</option><option value="post">post</option><option value="postmenu">postmenu</option><option value="postmostviewd">postmostviewd</option><option value="pp_button">pp_button</option><option value="pp_login">pp_login</option><option value="pro_megamenu">pro_megamenu</option><option value="product_tab">product_tab</option><option value="slideshow">slideshow</option><option value="special">special</option><option value="store">store</option><option value="thread">thread</option><option value="visitor_counter">visitor_counter</option><option value="xform">xform</option></select></div></div></div><div class="modal-footer"><button href="#" class="btn btn-primary shortcode-module-btn">Insert</button></div></form></div></div></div>');
            $(document).delegate("#shortcode-module", "click", function() {
                $(".shortcode-module").css({
                    "display": "block",
                    "background": "rgba(0,0,0,0.4)"
                });
                $(this).parents(".note-editor").find(".note-editable").focus();
                if (window.getSelection) {
                    elm = window.getSelection();
                    range = elm.getRangeAt(0);
                    w_select = true;
                } else {
                    elm = document.selection.createRange();
                    w_select = false;
                }
            });
            $(document).delegate(".close", "click", function() {
                $(this).parents(".shortcode-module").css("display", "none");
            });
            $(document).delegate(".shortcode-module-btn", "click", function(event) {
                $(this).parents(".shortcode-module").css("display", "none");
            });
            $(".shortcode-module-form").submit(function(event) {
                var _this = $(this);
                event.preventDefault();
                var values = {};
                $.each($(this).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                var shortcode = '[module ';
                for (i in values) {
                    shortcode += i + '=' + values[i] + ' ';
                }
                shortcode += '/]';
                $.ajax({
                    url: 'https://demo.website500k.com/proins/index.php?route=api/shortcodes/doShortCodes',
                    type: 'post',
                    dataType: 'text',
                    data: {
                        shortcode: shortcode
                    },
                    success: function(text) {
                        insertShortCodes(text, elm, range, w_select);
                        _this.parents(".shortcode-module").css("display", "none");
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        _this.parents(".shortcode-module").css("display", "none");
                    }
                });
            });
        }, 300);
        var elm, range, w_select;
        setTimeout(function() {
            $(".note-toolbar .note-insert").append('<button type="button" id="shortcode-pdf" class="btn btn-default btn-sm btn-small" title="PDF Embedder"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>');
            $(".note-editor .note-dialog").append('<div class="shortcode-pdf modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close">×</button><h4 class="modal-title">PDF Embedder</h4><small class="text-muted">[pdf src="URL" width="number" height="number" /]</small></div><form class="note-modal-form shortcode-pdf-form"><div class="modal-body"><div class="row-fluid"><div class="form-group"><label>PDF links</label><input type="text" name="src" class="form-control" /></div><div class="form-group"><label>Width</label> (<small class="text-muted">Only number</small>)<input type="number" name="width" class="form-control" /></div><div class="form-group"><label>Height</label> (<small class="text-muted">Only number</small>)<input type="number" name="height" class="form-control" /></div></div></div><div class="modal-footer"><button href="#" class="btn btn-primary shortcode-pdf-btn">Insert</button></div></form></div></div></div>');
            $(document).delegate("#shortcode-pdf", "click", function() {
                $(".shortcode-pdf").css({
                    "display": "block",
                    "background": "rgba(0,0,0,0.4)"
                });
                $(this).parents(".note-editor").find(".note-editable").focus();
                if (window.getSelection) {
                    elm = window.getSelection();
                    range = elm.getRangeAt(0);
                    w_select = true;
                } else {
                    elm = document.selection.createRange();
                    w_select = false;
                }
            });
            $(document).delegate(".close", "click", function() {
                $(this).parents(".shortcode-pdf").css("display", "none");
            });
            $(document).delegate(".shortcode-pdf-btn", "click", function(event) {
                $(this).parents(".shortcode-pdf").css("display", "none");
            });
            $(".shortcode-pdf-form").submit(function(event) {
                var _this = $(this);
                event.preventDefault();
                var values = {};
                $.each($(this).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                var shortcode = '[pdf ';
                for (i in values) {
                    shortcode += i + '=' + values[i] + ' ';
                }
                shortcode += '/]';
                $.ajax({
                    url: 'https://demo.website500k.com/proins/index.php?route=api/shortcodes/doShortCodes',
                    type: 'post',
                    dataType: 'text',
                    data: {
                        shortcode: shortcode
                    },
                    success: function(text) {
                        insertShortCodes(text, elm, range, w_select);
                        _this.parents(".shortcode-pdf").css("display", "none");
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        _this.parents(".shortcode-pdf").css("display", "none");
                    }
                });
            });
        }, 300);
        var elm, range, w_select;
        setTimeout(function() {
            $(".note-toolbar .note-insert").append('<button type="button" id="shortcode-tinyex" class="btn btn-default btn-sm btn-small" title="Load tiny extenstion"><i class="fa fa-cubes" aria-hidden="true"></i></button>');
            $(".note-editor .note-dialog").append('<div class="shortcode-tinyex modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close">×</button><h4 class="modal-title">Load tiny extenstion</h4><small class="text-muted">[tinyex name="string" /]</small></div><form class="note-modal-form shortcode-tinyex-form"><div class="modal-body"><div class="row-fluid"><div class="form-group"><label>Name</label> (<small class="text-muted">PHP name file of tiny extension in tinyex folder.</small>)<select name="name" class="form-control" ><option value="product">product</option></select></div></div></div><div class="modal-footer"><button href="#" class="btn btn-primary shortcode-tinyex-btn">Insert</button></div></form></div></div></div>');
            $(document).delegate("#shortcode-tinyex", "click", function() {
                $(".shortcode-tinyex").css({
                    "display": "block",
                    "background": "rgba(0,0,0,0.4)"
                });
                $(this).parents(".note-editor").find(".note-editable").focus();
                if (window.getSelection) {
                    elm = window.getSelection();
                    range = elm.getRangeAt(0);
                    w_select = true;
                } else {
                    elm = document.selection.createRange();
                    w_select = false;
                }
            });
            $(document).delegate(".close", "click", function() {
                $(this).parents(".shortcode-tinyex").css("display", "none");
            });
            $(document).delegate(".shortcode-tinyex-btn", "click", function(event) {
                $(this).parents(".shortcode-tinyex").css("display", "none");
            });
            $(".shortcode-tinyex-form").submit(function(event) {
                var _this = $(this);
                event.preventDefault();
                var values = {};
                $.each($(this).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                var shortcode = '[tinyex ';
                for (i in values) {
                    shortcode += i + '=' + values[i] + ' ';
                }
                shortcode += '/]';
                $.ajax({
                    url: 'https://demo.website500k.com/proins/index.php?route=api/shortcodes/doShortCodes',
                    type: 'post',
                    dataType: 'text',
                    data: {
                        shortcode: shortcode
                    },
                    success: function(text) {
                        insertShortCodes(text, elm, range, w_select);
                        _this.parents(".shortcode-tinyex").css("display", "none");
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        _this.parents(".shortcode-tinyex").css("display", "none");
                    }
                });
            });
        }, 300);
    </script>

</section>