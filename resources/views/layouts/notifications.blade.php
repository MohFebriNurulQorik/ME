<script>
    function hapusnotif(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("haspus Notif")
            }else{
                console.log(769);
            }
        };
        xhttp.open("GET", "{{url('/')}}/NotifikasiDelete/"+id+"/"+'{{Auth()->id()}}'+"?_token = <?php echo csrf_token() ?>", true);
        xhttp.send();
        $('#'+id).hide();
    }
    function openurlku(id,url){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location = "{{url('/')}}/"+url;
            }else{
                console.log(769);
            }
        };
        xhttp.open("GET", "{{url('/')}}/NotifikasiDelete/"+id+"/"+'{{Auth()->id()}}'+"?_token = <?php echo csrf_token() ?>", true);
        xhttp.send();

        console.log(url,id);
    }
</script>

<div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">

    <!-- Dropdown header -->
    <div class="px-3 py-3">
      <h6 class="text-sm text-muted m-0">Kamu Mempunyai <strong class="text-primary">{{Auth::user()->unreadNotifications->count()}}</strong> notifikasi.</h6>
    </div>
    <!-- List group -->
    @foreach (Auth::user()->unreadNotifications as $notification)
    <div class="list-group list-group-flush" id="{{$notification->id}}">
        <button  class="list-group-item list-group-item-action" onclick="openurlku('{{$notification->id}}','{{$notification->data['url']}}')" >
          <div class="row align-items-center">
            <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Perekenalakan nama ku E-PEP, Saya siap membantu Anda">
              <!-- Avatar -->
              <img alt="Image placeholder" src="{{ url('template/assets/img/theme/team-1.jpg') }}" class="avatar rounded-circle">
            </div>
            <div class="col ml--2">

              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h5 class="mb-0 text-sm">{{$notification->data['type_info']}}</h5>
                </div>
                <div class="text-right text-muted">
                  <small>{{$notification->created_at}}</small>
                </div>
              </div>
                 <p style="padding-top: 8px; padding-bottom: 12px;" class="text-sm mb-0">{{$notification->data['info']}}</p>
                <div style="width: 100%" class="text-right"><a style="text-align: right" class="btn btn-sm text-right" onclick="hapusnotif('{{$notification->id}}')"><i class="fas fa-trash-alt"></i></a></div>
            </div>
          </div>
        </button>
      </div>
    @endforeach

    <!-- View all -->
    <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
  </div>
