

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('assets/stisla-master/assets/js/stisla.js')?>"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url('assets/stisla-master/assets/js/scripts.js')?>"></script>
  <script src="<?= base_url('assets/stisla-master/assets/js/custom.js')?>"></script>

  <!-- Page Specific JS File
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

</body>
</html>
<script>
$( function() {
$( "#datepicker" ).datepicker();
} );
</script>
<script>
$(document).ready(function() {
    var i = 1;

    // Add form while clicking on add button
    $('#btn_add_license').click(function() {
        i++;
        $('#dynamic_field').append(
            ' <div class="row js-append lic_rows" id="first_row' + i +
            '" > <div class="form-group col-lg-5"> <label> Kode SBM</label> <input type="text" class=" form-control" name="nama_akun' +
            i +
            '" placeholder="Enter name" maxlength="35" class="form-control name_list" aria-required="true" /> </div><div class="form-group col-lg-5"><label> Kategori</label> <input type="text" class="form-control" name="kategori' +
            i +
            '" placeholder="" maxlength="35" class="form-control name_list" aria-required="true" /> </div><div class="form-group col-lg-5"> <label> Sub Kategori </label> <input type="text" class="form-control" name="sub_kategori' +
            i +
            '" placeholder="Enter name" maxlength="35" class="form-control name_list" aria-required="true" /> </div><div class="form-group col-lg-5"><label> Nama SBM</label> <input type="text" class="form-control" name="nama_sbm' +
            i +
            '" placeholder="" maxlength="35" class="form-control name_list" aria-required="true" /> </div> <div class="form-group col-lg-3"> <label> Satuan </label> <input type="text" class="form-control" name="satuan' +
            i +
            '" placeholder="Enter name" maxlength="35" class="form-control name_list" aria-required="true" /> </div><div class="form-group col-lg-5"><label> Nominal</label> <input type="text" class="form-control" name="nominal' +
            i +
            '" placeholder="" maxlength="35" class="form-control name_list" aria-required="true" /> </div><div class="form-group col-lg-2">  <button type="button" name="remove" id="' +
            i +
            '" class="btn btn-danger btn_remove">Remove</button>  </div>  </div> <hr>'
        );

        $('#license_count').val(i);
    });

    // remove license row on clicking remove btn
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#first_row' + button_id + '').remove();
        i--;
        $('#license_count').val(i);
    });
});
</script>
<script>
const steps = Array.from(document.querySelectorAll("form .step"));
const nextBtn = document.querySelectorAll("form .next-btn");
const prevBtn = document.querySelectorAll("form .previous-btn");
const form = document.querySelector("form");

nextBtn.forEach((button) => {
  button.addEventListener("click", () => {
    changeStep("next");
  });
});
prevBtn.forEach((button) => {
  button.addEventListener("click", () => {
    changeStep("prev");
  });
});

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const inputs = [];
  form.querySelectorAll("input").forEach((input) => {
    const { name, value } = input;
    inputs.push({ name, value });
  });
  console.log(inputs);
  form.reset();
});

function changeStep(btn) {
  let index = 0;
  const active = document.querySelector(".active");
  index = steps.indexOf(active);
  steps[index].classList.remove("active");
  if (btn === "next") {
    index++;
  } else if (btn === "prev") {
    index--;
  }
  steps[index].classList.add("active");
}
</script>
