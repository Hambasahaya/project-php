<!-- View (cart_page.php) -->
<?= $this->extend('template/template1'); ?>
<?= $this->section('content') ?>
<div class="cart-page">
  <div class="cart-item">
    <form id="checkoutForm" method="post" action="#">
      <?php foreach ($produk_data as $data_cart) : ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $data_cart['id_product'] ?>" id="flexCheckChecked_<?= $data_cart['id_product'] ?>" name="produk_selected[]" data-id="<?= $data_cart['id_product'] ?>">
          <label class="form-check-label" for="flexCheckChecked_<?= $data_cart['id_product'] ?>">
          </label>
          <br>
          <button type="button" onclick="decreaseQty('<?= $data_cart['id_product'] ?>')" class="btn btn-primary">-</button>
          <input type="text" id="quantity_<?= $data_cart['id_product'] ?>" data-stok="<?= $data_cart['stok'] ?>" data-qty="<?= $data_cart['qty'] ?>" value="<?= $data_cart["qty"] ?>" data-harga="<?= $data_cart['price'] ?>" readonly name="quantity[]">
          <button type="button" onclick="increaseQty('<?= $data_cart['id_product'] ?>')" class="btn btn-success">+</button>
          <button type="button" onclick="hapus('<?= $data_cart['id_product'] ?>')" class="btn btn-success">hapus</button>
        </div>
        <div class="card mb-3" style="max-width: 540px; padding:20px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?= $data_cart['photo_prd'] ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?= $data_cart['name_product'] ?></h5>
                <p class="card-text"><?= $data_cart['description'] ?></p>
                <p class="card-text">Sisa Stok:<?= $data_cart['stok'] ?></p>
                <p class="card-text">Harga:<?= $data_cart['price'] ?></p>
                <p class="card-text"><small class="text-body-secondary"></small></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="cart-action d-flex">
        <div class="cart-subtotal">
          <p>Sub-total:</p>
          <h5 id="total">0</h5>
        </div>
        <div class="checkout-btn">
          <div class="d-grid gap-2">
            <button id="checkoutButton" class="btn btn-primary" type="button">Checkout!</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  function update_subtotal(qty, price) {
    Subtotal = qty * price;
    document.getElementById('total').innerText = new Intl.NumberFormat('ja-JP', {
      style: 'currency',
      currency: 'IDR'
    }).format(Subtotal);
  }

  function increaseQty(productId) {
    var quantityInput = document.getElementById('quantity_' + productId);
    var currentQty = parseInt(quantityInput.value, 10);
    var stok = parseInt(quantityInput.getAttribute('data-stok'), 10);

    if (currentQty < stok) {
      quantityInput.value = currentQty + 1;
      update_subtotal(currentQty + 1, parseInt(quantityInput.getAttribute('data-harga'), 10));
    }
  }

  function decreaseQty(productId) {
    var quantityInput = document.getElementById('quantity_' + productId);
    var currentQty = parseInt(quantityInput.value, 10);

    // Jangan kurangi qty jika sudah 1 atau kurang
    if (currentQty > 1) {
      quantityInput.value = currentQty - 1;
      update_subtotal(currentQty - 1, parseInt(quantityInput.getAttribute('data-harga'), 10));
    }
  }

  function hapus(id_prd) {
    $.ajax({
      type: "POST",
      url: "/hapuscart",
      data: {
        id_prdd: id_prd
      },
      success: function(response) {
        window.location.href = '/cart_page';
      }
    });
    return false;
  }

  function handleCheckoutClick() {
    var selectedProducts = [];
    $("input[name='produk_selected[]']:checked").each(function() {
      var productId = $(this).data('id');
      var quantity = $("#quantity_" + productId).val();
      selectedProducts.push({
        id: productId,
        qty: quantity
      });
    });

    $.ajax({
      type: "POST",
      url: "/checkout",
      data: {
        selectedProducts: selectedProducts
      },
      success: function(response) {
        window.location.href = '/pagechk';
      }
    });
    return false;
  }

  document.getElementById('checkoutButton').addEventListener('click', handleCheckoutClick);
</script>
<?= $this->endSection(); ?>