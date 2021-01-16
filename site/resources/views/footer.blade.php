			<!-- BEGIN FOOTER -->
			<!-- <div class="page-footer">
                <div class="page-footer-inner"> {{date("Y")}} &copy; SES Governance
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div> -->
            <!-- END FOOTER -->
        </div>
        <!-- END PAGE WRAPPER -->

        <script type="text/javascript">
        	var base_url = "{{url('/')}}";
			
			var api_url = "http://localhost/ses_patool/public";

			var CSRF_TOKEN = "{{ csrf_token() }}";

        </script>
		<script src="{{url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
		<script type="text/javascript" src="{{url('assets/global/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
		<script src="{{url('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{url('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
		<script src="{{url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
		<script src="{{url('assets/global/plugins/bootbox/bootbox.min.js')}}" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->

		<!-- END PAGE LEVEL PLUGINS -->
		<!-- BEGIN THEME GLOBAL SCRIPTS -->
		<script src="{{url('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
		<!-- END THEME GLOBAL SCRIPTS -->
		<!-- BEGIN PAGE LEVEL SCRIPTS -->

		<!-- BEGIN THEME LAYOUT SCRIPTS -->
		<script src="{{url('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>

		<script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/selectize.min.js')}}"></script>

		<script type="text/javascript" src="{{url('assets/global/scripts/datatable.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/global/plugins/datatables/datatables.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"></script>

		<!--Begin Angular scripts -->
		<script type="text/javascript" src="{{url('assets/admin/scripts/angular.min.js')}}" ></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/jcs-auto-validate.js')}}" ></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/spin.min.js')}}" ></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/ladda.min.js')}}" ></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/angular-ladda.min.js')}}" ></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/ng-file-upload-shim.min.js')}}" ></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/ng-file-upload.min.js')}}" ></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/angular-sanitize.js')}}" ></script>

		<script src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script>

		<script type="text/javascript" src="{{url('assets/admin/scripts/angular-datatables.min.js')}}"></script>

		<script type="text/javascript" src="{{url('assets/admin/scripts/angular-selectize.js')}}" ></script>

		<script type="text/javascript" src="{{url('assets/admin/scripts/angular-selectize.js')}}" ></script>
		
		<script type="text/javascript" src="{{url('assets/admin/scripts/core/custom.js?v=1.0.9')}}"></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/core/app.js?v=1.0.9')}}" ></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/core/controllers.js?v=1.0.9')}}" ></script>
		<script type="text/javascript" src="{{url('assets/admin/scripts/core/services.js?v=1.0.9')}}" ></script>
		<!-- End Angular Scripts -->

		<script src="{{url('assets/main/custom.js')}}" type="text/javascript"></script>
		<!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>