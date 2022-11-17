<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'><link rel="stylesheet" href="./style.css">
	<style>
	.card {
  border-bottom: 2px solid rgba(162, 162, 162, 0.5);
}
</style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" style="margin-top: -15px;">
  <h1 class="text-center m-3">Add FLIGHT</h1>
  <div class="row justify-content-md-center">
    <div class="col col-md-8 col-lg-6">
   <form method="post" action="<?php echo base_url();?>Admin/upd_flight">
   <?php foreach($res as $row) { ?>
        <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $this->input->get('id')?>">
          <label for="productName">ORIGIN</label>
          <input name="origin" type="text" value="<?php echo $row->origin; ?>" class="form-control" id="productName" required >
        </div>
        <div class="form-group">
          <label for="productPrice">DESTINATION</label>
          <input name="dest" type="text" class="form-control" value="<?php echo $row->dest; ?>" id="productPrice" required>
        </div>
        <div class="form-group">
          <label for="productPrice">ARRIVAL TIME</label>
          <input name="arr_time" type="text" class="form-control" value="<?php echo $row->arr_time; ?>" id="productPrice" required>
        </div>
        <div class="form-group">
          <label for="productPrice">DEPARTURE TIME</label>
          <input name="dep_time" type="time" class="form-control" value="<?php echo $row->dep_time; ?>" id="productPrice" required>
        </div>
        <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
   <?php } ?>
      </form>
    </div>
  </div>
  <div class="row justify-content-md-center">
    <div class="col col-md-8 col-lg-6">
      <hr>
    </div>
  </div>
</div>
</div>
<!-- partial -->
  <script  src="./script.js"></script>
  <script>
  var addProductFormEl = document.getElementById('addProductForm'),
  productNameInputEl = document.getElementById('productName'),
  productPriceInputEl = document.getElementById('productPrice'),
  btnSubmitEl = document.getElementById('btnSubmit'),
  productsEl = document.getElementById('products')

var counter = (function() {
  var count = 3

  return {
    increment: function() {
      return count++
    }
  }
})()

function Product(name, price) {
  this.id = +new Date()
  this.name = name
  this.price = price
  this.count = counter.increment()
}

function UI() {}

UI.prototype.addProduct = function(name, price) {
  var product = new Product(name, price),
    html = document.createElement('div')

  html.id = product.id
  html.className = 'card my-2 p-2'
  html.innerHTML =
    '<div class="card-title">Item &#8470; ' +
    product.count +
    '</br>ID: ' +
    product.id +
    '</div>' +
    '<div class="form-group">' +
    '<input type="text" class="form-control" value="' +
    product.name +
    '">' +
    '</div>' +
    '<div class="form-group">' +
    '<input type="number" class="form-control" value="' +
    product.price +
    '">' +
    '</div>' +
    '<button class="btn btn-danger" data-id="' +
    product.id +
    '">Remove item &#8470; ' +
    product.count +
    '</button>'

  productsEl.insertBefore(html, productsEl.childNodes[0])
}

UI.prototype.clearFormFields = function() {
  productNameInputEl.value = ''
  productPriceInputEl.value = ''
  productNameInputEl.focus()
}

UI.prototype.deleteProduct = function(id) {
  document.getElementById(id).remove()
}


addProductFormEl.addEventListener('submit', function(e) {
  e.preventDefault()

  var name = productNameInputEl.value,
    price = productPriceInputEl.value

  if (!name || !price) {
    return false
  }

  var ui = new UI()
  ui.addProduct(name, price)
  ui.clearFormFields()
})

productsEl.addEventListener('click', function(e) {
  e.preventDefault()
  if (e.target.className === 'btn btn-danger') {
    var ui = new UI()
    ui.deleteProduct(e.target.getAttribute('data-id'))
  }
})
  </script>
    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

</body>
</html>