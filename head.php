<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sweet G's</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="add_item.php">Add Item</a></li>
              <li><a href="add_customer.php">Add Customer</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="customers.php">View Customers</a></li>
                  <li><a href="items.php">View Items</a></li>
                  <li role="separator" class="divider">R</li>
                  <li class="dropdown-header">Receipts</li>
                  <li><a href="add_receipt.php">Add Receipt</a></li>
                  <?php // echo getHostByName(getHostName());?>
                </ul>
              </li>
              <li><a href="stats.php">Statistics</a></li>
            </ul>
          </div>
        </div>
      </nav>