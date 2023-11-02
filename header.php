<nav class="navbar navbar-expand navbar-dark bg-primary sticky-top">
  <div class="container">
    <a class="navbar-brand" href="."> <i class="bi bi-cup-hot">DeCafe </i></a>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $hasil['username']; ?>
            
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-2">
            <li><a class="dropdown-item" href="#"><i class="bi bi-file-person-fill"></i> Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> setting</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-in-left"></i> logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>