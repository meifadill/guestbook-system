<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Form Tamu</h2>
    <p>Form Kunjungan Tamu Homestay Java Turtle</p>
  </header>

  <div class="row gy-4">

    <div class="col-lg-6">

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-geo-alt"></i>
            <h3>Alamat Kami</h3>
            <p>Desa Sarongan,<br>Banyuwangi, Indonesia</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-telephone"></i>
            <h3>Telepon</h3>
            <p>+62 8122 3223 023<br>+62 8122 3223 023</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-envelope"></i>
            <h3>Email Kita</h3>
            <p>info@example.com<br>contact@example.com</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-clock"></i>
            <h3>Jam Kerja</h3>
            <p>Senin - Jum'at<br>8:00AM - 05:00PM</p>
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg-6">
      <form action="forms/contact.php" method="post" class="php-email-form">
        <div class="row gy-4">
          <div class="col-md-6">
            Check in<input type="date" name="check in" class="form-control" placeholder="Check In" required>
          </div>

          <div class="col-md-6 ">
            Check Out<input type="date" class="form-control" name="check out" placeholder="Check Out" required>
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" name="Nama Lengkap" placeholder="Nama Lengkap" required>
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" name="Alamat" placeholder="Alamat" required>
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" name="Pekerjaan" placeholder="Pekerjaan" required>
          </div>

          <div class="col-md-12 text-center">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Data anda sudah dikirim terimakasih!</div>

            <button type="submit">Send Message</button>
          </div>

        </div>
      </form>

    </div>

  </div>

</div>

</section><!-- End Contact Section -->