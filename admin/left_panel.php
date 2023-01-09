<?php
include 'if_admin.php';
if (!$admin) {
header("location:./");
}
else
{
echo '

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="./"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>


                    <h3 class="menu-title">Student Section</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="./add_student.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Add Student</a>    
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="./add_institute.php" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-home"></i>Add Institute</a> 
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="./add_subject.php" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Add Subject</a>
                    </li>
                    <li class="menu-item-has-children dropdown">  
                        <a href="./add_class.php" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Add Class</a> 
                    </li>



                    <h3 class="menu-title">Admin Section</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="./profile.php" class="dropdown-toggle" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Account</a> 
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="./visitors.php" class="dropdown-toggle" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Visitors</a> 
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="./contact_us.php" class="dropdown-toggle" aria-expanded="false"> <i class="menu-icon ti-email"></i>Contact Us</a>   
                    </li>


                    <!--  <h3 class="menu-title">Extras</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div><!-- navbar-collapse -->
        </nav>
    </aside><!--left-panel -->
    <!--End Left Panel -->';
}
?>
