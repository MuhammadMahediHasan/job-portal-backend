<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-default">e</h1>
        <h1 class="m-0 text-primary">Jobs</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link active"> Home </a>
            <a href="/about" class="nav-item nav-link"> About </a>

            <div class="nav-item dropdown">
                <a href="/jobs" class="nav-link dropdown-toggle"
                   data-bs-toggle="dropdown"> Jobs </a>

                <div class="dropdown-menu rounded-0 m-0">
                    <a href="/job-list" class="dropdown-item"> Job List </a>
                    <a href="/job-details" class="dropdown-item"> Job Detail </a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="/jobs" class="nav-link dropdown-toggle"
                   data-bs-toggle="dropdown"> Pages </a>

                <div class="dropdown-menu rounded-0 m-0">
                    <a href="/job-category" class="dropdown-item"> Job Category </a>
                    <a href="/testimonial" class="dropdown-item"> Testimonial </a>
                    <a href="/profile" class="dropdown-item"> Profile </a>
                    <a href="/404" class="dropdown-item"> 404 </a>
                </div>
            </div>
            <a href="/contact" class="nav-item nav-link"> Contact </a>
            @if(companyAuthCheck() || jobSeekerAuthCheck())
                <div class="nav-item dropdown">
                    <a href="#"
                       class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown">
                        {{ profileName() }}
                        {{--                        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"--}}
                        {{--                             width="40" height="40" class="rounded-circle" alt="">--}}
                    </a>

                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ companyAuthCheck() ? '/company/profile' : '/job-seeker/profile'}}"
                           class="dropdown-item"> Profile </a>
                        <a href="{{ companyAuthCheck() ? '/company/logout' : '/job-seeker/logout'}}"
                           class="dropdown-item"> Logout </a>
                    </div>
                </div>
            @else
                <div class="nav-item dropdown">
                    <a href="#"
                       class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown">
                        Sign Up | Sign In
                    </a>
                    <ul class="dropdown-menu rounded-0 m-0 sub-menu auth">
                        <li>
                            <div class="image">
                                <img src="/img/manager.png" alt="employer"/>
                            </div>
                            <div>
                                <h3>Employer</h3>
                                <p>Login or Register to find the best candidate</p>
                                <ul class="buttons">
                                    <a href="/company/login">Login</a>
                                    <a href="/company/register">Register</a>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="image">
                                <img src="/img/contract.png" alt="candidate"/>
                            </div>
                            <div>
                                <h3>Job seeker</h3>
                                <p>Login or Register to grab the best opportunity</p>
                                <div class="buttons">
                                    <a href="/job-seeker/login">Login</a>
                                    <a href="/job-seeker/register">Register</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</nav>
