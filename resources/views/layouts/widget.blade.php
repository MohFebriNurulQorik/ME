@if(Auth::check())

  <div class="header-body" >
    <!-- Card stats -->
    <div class="row">

      <div class="col-xl-3 col-md-6">
        <div class="card bg-gradient-danger border-0">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0 text-white">User</h5>
                <span class="h2 font-weight-bold mb-0 text-white">#</span>
                <div class="progress progress-xs mt-3 mb-0" style="visibility: hidden">
                  <div class="progress-bar bg-default" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                </div>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                  <i class="fas fa-users"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <a href="#" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-gradient-warning border-0">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Barang</h5>
                <span class="h2 font-weight-bold mb-0 text-white">#</span>
                <div class="progress progress-xs mt-3 mb-0" style="visibility: hidden">
                  <div class="progress-bar bg-default" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                </div>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                  <i class="fas fa-box"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
            <a href="#" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-gradient-info border-0">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Order</h5>
                <span class="h2 font-weight-bold mb-0 text-white">#</span>
                <div class="progress progress-xs mt-3 mb-0" style="visibility: hidden">
                  <div class="progress-bar bg-default" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                </div>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                  <i class="fas fa-check"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <a href="" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-gradient-success border-0">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0 text-white">History</h5>
                <span class="h2 font-weight-bold mb-0 text-white">#</span>
                <div class="progress progress-xs mt-3 mb-0" style="visibility: hidden">
                  <div class="progress-bar bg-default" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                </div>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                  <i class="fas fa-history"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <a href="" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
