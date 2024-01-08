<?php 
include 'admin/db_connect.php'; 
?>
<style>
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.gallery-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}
.gallery-img,.gallery-list .card-body {
    width: calc(50%)
}
.gallery-img img{
    border-radius: 5px;
    min-height: 50vh;
    max-width: calc(100%);
}
span.hightlight{
    background: yellow;
}
.carousel,.carousel-inner,.carousel-item{
   min-height: calc(100%)
}
header.masthead,header.masthead:before {
        min-height: 50vh !important;
        height: 50vh !important
    }
.row-items{
    position: relative;
}
.masthead{
        min-height: 23vh !important;
        height: 23vh !important;
    }
     .masthead:before{
        min-height: 23vh !important;
        height: 23vh !important;
    }

</style>
<header class="masthead">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-white">Donation</h3>
                <hr class="divider my-4" /> 
            </div>
        </div>
    </div>
</header>
<div class="container mt-3 pt-2">
    <div class="card mb-4">
        <div class="card-body p-5">
            <form action="" method="POST" class="row p-5" id="donate-amount">
                <div class="col-md-12 mb-4">
                    <label>Fullname</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-12 mb-4">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-12 mb-4">
                    <label>Mobile</label>
                    <input type="number" name="mobile" class="form-control" required>
                </div>
                <div class="col-md-12 mb-4">
                    <label>Amount</label>
                    <input type="number" name="amount" class="form-control" required>
                </div>
                <div class="col-md-3 mb-4 b-1">
                    <label>QR for transfer amount</label><br>
                    <img src="assets/gpay.jpeg" class="img-fluid" style="width: 188px; height: 188px;">
                </div>
                <div class="col-md-9 mb-4 pt-5">
                    <label>Upload payment proof</label>
                    <input type="file" name="payproof" class="form-control p-1" required>
                </div>
                <div class="col-md-12 text-center mt-5">
                    <input type="submit" name="donate" class="btn btn-primary btn-sm">
                </div>
            </form>
        </div>
    </div>
</div>
    
</div>


<script>
    $('#donate-amount').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'admin/ajax.php?action=donate_amount',
            data:new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                console.log("Twe", resp);
                if(resp == 1){
                    alert_toast("Data successfully saved.",'success')
                    setTimeout(function(){
                        location.reload()
                    },1000)
                }
            }
        })
    });
</script>