@include('backend.layouts.css')

<body id="page-top">

<!-- Page Wrapper -->

<div id="preloader"></div>
<div id="wrapper">

@include('backend.layouts.sidebar')

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('backend.layouts.header')

            @yield('content')

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white mt-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright text-left ml-3">
                        <span>Copyright &copy; <a class="footer-developer" href="" target="_blank">eJobs</a>&nbsp; {{ date('Y') }}</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="copyright text-right mr-3">
                        <a class="footer-developer" href="https://muhammadmahedihasan.github.io/" target="_blank">
                            <span>Developed By <i class="fa fa-heart text-danger"></i> Muhammad Mahedi Hasan</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

@include('backend.layouts.js')
