  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <!-- hapus alert -->
          <?php if (session()->getFlashdata("hapus")) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= session()->getFlashdata("hapus"); ?></strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php endif; ?>
          <!-- end -->
          <!-- hapus alert -->
          <?php if (session()->getFlashdata("tambah")) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= session()->getFlashdata("tambah"); ?></strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php endif; ?>
          <!-- end -->
          <!-- hapus alert -->
          <?php if (session()->getFlashdata("update")) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= session()->getFlashdata("update"); ?></strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php endif; ?>
          <!-- end -->

          <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
      </div>
      <div class="btn-group" role="group" aria-label="Basic outlined example">
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-person-plus"></i> Tambah Karyawan</button>
          <button type="button" class="btn btn-outline-success"><i class="bi bi-arrow-down-square-fill"></i> Download Data</button>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Nomor Whatsapp</th>
                          <th>Jabatan</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($dataker as $data) : ?>
                          <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $data["nama_karyawan"]; ?></td>
                              <td><?= $data["alamat"] ?></td>
                              <td><?= $data["no_tlp"] ?></td>
                              <td><?= $data["nama_jabatan"] ?></td>
                              <td>
                                  <img src="/img/userIMG/<?= $data["foto"] ?>" alt="" class="rounded mx-auto d-block">
                              </td>
                              <td>
                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                      <form action="/Admin/<?= $data["id_karyawan"] ?>" method="post">
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" class="btn btn-outline-danger"><i class="bi bi-x-octagon-fill"> Hapus</i></button>
                                      </form>
                                      <a href="/Admin/edit/<?= $data["id_karyawan"]; ?>" type="button" class="btn btn-outline-warning"><i class="bi bi-magic"></i> Edit</a>
                                  </div>
                              </td>
                          </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>
              <!-- tambah karyawan -->
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Karyawan</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="container">
                                  <figure class="figure">
                                      <img src="/img/icond.png" class="figure-img img-fluid rounded" alt="..." id="pr">
                                      <figcaption class="figure-caption"></figcaption>
                                  </figure>
                                  <form action="/Admin/addKaryawan" method="post" enctype="multipart/form-data">
                                      <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
                                          <input type="text" class="form-control" required name="nama">
                                      </div>
                                      <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Alamat Karyawan</label>
                                          <input type="text" class="form-control" name="alamat" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Nomor Hp</label>
                                          <input type="number" class="form-control" name="no" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Username</label>
                                          <input type="text" class="form-control" name="username" required>
                                          <div id="emailHelp" class="form-text">Digunakan Pada saat Karyawan login</div>
                                      </div>
                                      <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Password</label>
                                          <input type="password" class="form-control" name="pass" id="pass" required>
                                          <button class="btn btn-outline-secondary mt-2" type="button" id="showing"><img src="/img/show.png" alt="" srcset="" width="15px" height="15px" id="iconn"></button>
                                      </div>
                                      <div class="mb-3">
                                          <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="jabatan" required>
                                              <option selected>Jabatan Karyawan</option>
                                              <option value="2">Admin/Kasir</option>
                                              <option value="3">Pengantar/Kurir</option>
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                          <label for="formFile" class="form-label">Foto Karyawan</label>
                                          <input class="form-control" type="file" id="file" accept="image/*" onchange="upload(event)" name="foto">
                                      </div>
                                      <button type="submit" class="btn btn-primary">Proses Data!</button>
                                  </form>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                          </div>
                      </div>
                  </div>
              </div>

              <script>
                  const pr = document.getElementById("pr");
                  const upload = function(event) {
                      pr.src = URL.createObjectURL(event.target.files[0]);
                  };
                  const btn = document.getElementById('showing');
                  const pw = document.getElementById("pass");
                  const icon = document.getElementById('iconn');
                  btn.addEventListener('click', function() {
                      if (pw.type === "password") {
                          pw.type = "text";
                          icon.src = "/img/hide.png";
                      } else {
                          pw.type = "password";
                          icon.src = "/img/show.png"
                      }
                  });
              </script>