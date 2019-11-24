    <!-- Footer -->
    <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-xs clearfix">
            <div class="float-right">
                Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600">ndifriend</a>
            </div>
            <div class="float-left">
                <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Immunize</a> &copy; <span class="js-year-copy">2019</span>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!--
            Codebase JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/jquery.countTo.min.js
            assets/js/core/js.cookie.min.js
        -->

        <!-- JQuery -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/codebase.core.min.js"></script>
       
        <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="../assets/js/codebase.app.min.js"></script>
        <!-- Page JS Code -->
        <script src="../assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="../assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="../assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="../assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="../assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script src="../assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
        <script src="../assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
        <script src="../assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="../assets/js/plugins/dropzonejs/dropzone.min.js"></script>
        <script src="../assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js"></script>
        <script src="../assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="../assets/js/plugins/es6-promise/es6-promise.auto.min.js"></script>
        <script src="../assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="../assets/js/plugins/jquery-validation/additional-methods.js"></script>
        <!-- <script src="../assets/js/pages/be_tables_datatables.min.js"></script> -->
        <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins) -->
        <script>jQuery(function(){ Codebase.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script>
   