<!DOCTYPE html>
<html lang="fa" direction="rtl" dir="rtl" style="direction: rtl" >
<!--begin::Head-->
<head>
    <meta charset="utf-8" />
    <title>ورود به مدیریت</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="assets/css/pages/login/login-2.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.rtl.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.rtl.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/brand/dark.rtl.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/aside/dark.rtl.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/font.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="../images/logo3.png" />
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" style="background-image: url('../images/login-back.jpg');background-repeat: no-repeat,repeat;background-size: cover" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root" style="background-image:login-back.jpg">
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-dark-o-15" id="kt_login">
        <!--begin::Aside-->
            <!--begin: Aside Container-->
            <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
                <!--begin::Logo-->
                <a href="#" class="text-center pt-2">
                    <img src="../images/logo2.png" class="max-h-75px" alt="" />
                </a>
                <!--end::Logo-->
                <!--begin::Aside body-->
                <div class="d-flex flex-column-fluid flex-column flex-center">
                    <div class="login-form login-signin py-11">
                        <form class="form" id="form_manager_login" method="get" action="AuthenticationRequest.php">
                            <div class="text-center pb-8">
                                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">ورود</h2>
                            </div>
                            <input type="hidden" value="login" name="action">
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">نام کاربری:</label>
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="user_name"/>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">کلمه عبور:</label>
                                </div>
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password"/>
                            </div>
                            <div class="text-center pt-2">
                                <button type="submit" class="btn font-weight-bolder font-size-h6 px-8 py-4 my-3 text-light" style="background-color:#6f42c1" >ورود</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Aside body-->
                <!--begin: Aside footer for desktop-->

                <!--end: Aside footer for desktop-->
            </div>
            <!--end: Aside Container-->
        <!--begin::Aside-->
        <!--begin::Content-->
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->

<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/app.js"></script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>