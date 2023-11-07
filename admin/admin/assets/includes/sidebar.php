<?php

$admin = new Admin();

function notactive($currect_page)
{
  $url_array = explode('/admin/', $_SERVER['REQUEST_URI']);
  $url = end($url_array);
  if ($currect_page != $url) {
    echo 'collapsed'; //class name in css 
  }
}
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?php notactive('index.php'); ?>" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <!--End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Home Page</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link <?php notactive('homepart.php'); ?>" href="homepart.php">
            <i class="bi bi-circle"></i><span>Slider</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php notactive('noticenew.php'); ?>" href="noticenew.php">
            <i class="bi bi-circle"></i><span>Notice news</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php notactive('noticeandevent.php'); ?>" href="noticeandevent.php">
            <i class="bi bi-circle"></i><span>News & Events</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php notactive('admission.php'); ?>" href="admission.php">
            <i class="bi bi-circle"></i><span>Admission</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Faculty </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link <?php notactive('teachingdegree.php'); ?>" href="teachingdegree.php">
            <i class="bi bi-circle"></i><span>Teaching Degree</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php notactive('teachingjunior.php'); ?>" href="teachingjunior.php">
            <i class="bi bi-circle"></i><span>Teaching Junior</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav3" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link <?php notactive('sportsevent.php'); ?>" href="sportsevent.php">
            <i class="bi bi-circle"></i><span>Sports (reports)</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php notactive('culturalevent.php'); ?>" href="culturalevent.php">
            <i class="bi bi-circle"></i><span>Cultural Activities (reports)</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php notactive('urjaevent.php'); ?>" href="urjaevent.php">
            <i class="bi bi-circle"></i><span>Urja Fest (reports)</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php notactive('nssevent.php'); ?>" href="nssevent.php">
            <i class="bi bi-circle"></i><span>NSS (Reports)</span>
          </a>
        </li>
      </ul>
    </li>

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link <?php notactive('manage-projects-2.php'); ?>" href="manage-projects-2.php" id="manage-project">-->
    <!--    <i class="bi bi-box-seam"></i>-->
    <!--    <span>Interior Designing</span>-->
    <!--  </a>-->
    <!--</li>-->




    <!--<li class="nav-item">-->
    <!--  <a class="nav-link <?php notactive('manage-roles.php'); ?>" href="manage-roles.php">-->
    <!--      <i class="bi bi-person-check-fill"></i>-->
    <!--      <span>Manage Roles</span>-->
    <!--  </a>-->
    <!--</li>-->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link <?php notactive('manage-orders.php'); ?>" href="manage-orders.php">-->
    <!--      <i class="bi bi-cart-check"></i>-->
    <!--      <span>Manage Orders</span>-->
    <!--      <span class="badge rounded-pill bg-warning text-dark"><?php echo $newOrderCount; ?></span>-->
    <!--  </a>-->
    <!--</li>-->

    <!--<li class="nav-item">-->
    <!--    <a class="nav-link <?php notactive('manage-customers.php'); ?>" href="manage-customers.php">-->
    <!--        <i class="bi bi-file-earmark-person-fill"></i>-->
    <!--        <span>Manage Customers</span>-->
    <!--    </a>-->
    <!--</li>-->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link <?php notactive('manage-promotions.php'); ?>" href="manage-promotions.php">-->
    <!--      <i class="bi bi-tags-fill"></i>-->
    <!--      <span>Manage Promotions</span>-->
    <!--  </a>-->
    <!--</li>-->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link <?php notactive('manage-content.php'); ?>" href="manage-content.php">-->
    <!--      <i class="bi bi-card-checklist"></i>-->
    <!--      <span>Manage Content</span>-->
    <!--  </a>-->
    <!--</li>-->



    <!-- End Forms Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">-->
    <!--    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>-->
    <!--  </a>-->
    <!--  <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">-->
    <!--    <li>-->
    <!--      <a href="tables-general.html">-->
    <!--        <i class="bi bi-circle"></i><span>General Tables</span>-->
    <!--      </a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--      <a href="tables-data.html">-->
    <!--        <i class="bi bi-circle"></i><span>Data Tables</span>-->
    <!--      </a>-->
    <!--    </li>-->
    <!--  </ul>-->
    <!--</li>-->
    <!-- End Tables Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">-->
    <!--    <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>-->
    <!--  </a>-->
    <!--  <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">-->
    <!--    <li>-->
    <!--      <a href="charts-chartjs.html">-->
    <!--        <i class="bi bi-circle"></i><span>Chart.js</span>-->
    <!--      </a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--      <a href="charts-apexcharts.html">-->
    <!--        <i class="bi bi-circle"></i><span>ApexCharts</span>-->
    <!--      </a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--      <a href="charts-echarts.html">-->
    <!--        <i class="bi bi-circle"></i><span>ECharts</span>-->
    <!--      </a>-->
    <!--    </li>-->
    <!--  </ul>-->
    <!--</li>-->
    <!-- End Charts Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">-->
    <!--    <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>-->
    <!--  </a>-->
    <!--  <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">-->
    <!--    <li>-->
    <!--      <a href="icons-bootstrap.html">-->
    <!--        <i class="bi bi-circle"></i><span>Bootstrap Icons</span>-->
    <!--      </a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--      <a href="icons-remix.html">-->
    <!--        <i class="bi bi-circle"></i><span>Remix Icons</span>-->
    <!--      </a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--      <a href="icons-boxicons.html">-->
    <!--        <i class="bi bi-circle"></i><span>Boxicons</span>-->
    <!--      </a>-->
    <!--    </li>-->
    <!--  </ul>-->
    <!--</li>-->
    <!-- End Icons Nav -->

    <!--<li class="nav-heading">Pages</li>-->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="users-profile.html">-->
    <!--    <i class="bi bi-person"></i>-->
    <!--    <span>Profile</span>-->
    <!--  </a>-->
    <!--</li>-->
    <!-- End Profile Page Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="pages-faq.html">-->
    <!--    <i class="bi bi-question-circle"></i>-->
    <!--    <span>F.A.Q</span>-->
    <!--  </a>-->
    <!--</li>-->
    <!-- End F.A.Q Page Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="pages-contact.html">-->
    <!--    <i class="bi bi-envelope"></i>-->
    <!--    <span>Contact</span>-->
    <!--  </a>-->
    <!--</li>-->
    <!-- End Contact Page Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="pages-register.html">-->
    <!--    <i class="bi bi-card-list"></i>-->
    <!--    <span>Register</span>-->
    <!--  </a>-->
    <!--</li>-->
    <!-- End Register Page Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="pages-login.html">-->
    <!--    <i class="bi bi-box-arrow-in-right"></i>-->
    <!--    <span>Login</span>-->
    <!--  </a>-->
    <!--</li>-->
    <!-- End Login Page Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="pages-error-404.html">-->
    <!--    <i class="bi bi-dash-circle"></i>-->
    <!--    <span>Error 404</span>-->
    <!--  </a>-->
    <!--</li>-->
    <!-- End Error 404 Page Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="pages-blank.html">-->
    <!--    <i class="bi bi-file-earmark"></i>-->
    <!--    <span>Blank</span>-->
    <!--  </a>-->
    <!--</li>-->
    <!-- End Blank Page Nav -->

  </ul>

</aside><!-- End Sidebar-->