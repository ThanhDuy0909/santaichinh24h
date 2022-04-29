<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check CIC</title>
</head>
<body>
   <div>
    <div class="flash-messages">
        <div class="flash-message flash-message--warning">
           <article>
              <h2 class="flash-message__header">
                 Lưu thông tin thành công
              </h2>
              {{-- @if (!empty($infor)) --}}
               {{-- @foreach ($infor as $infor) --}}
               <p>Mã CIC của bạn là: {{auth()->user()->ma_cic}} </p>
               {{-- @endforeach --}}
              {{-- @endif --}}
              <p class="flash-message__paragraph">
                 Xin vui lòng liên hệ admin qua zalo santaichinh24h để kích hoạt gói check cic
              </p>
              <p class="flash-message__paragraph">
                Cảm ơn bạn !
             </p>
           </article>
     
           <button class="flash-message__close">
              <a href="{{route('check')}}">Ok</a>
           </button>
        </div>

        
     </div>

     <div class="flash-messages">
      <div class="flash-message flash-message--warning" style="background-color:#FFCC33">
         <article>
            <h2 class="flash-message__header" style="position: relative;
            padding: 2rem;
            text-align: center;
            background-color:#CCFFFF;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 0.5rem;
            border-top-left-radius: 1rem;">
               Gói 500
            </h2>
   
            <p class="flash-message__paragraph">
               500 lượt check CIC/ tháng
            </p>
            <p class="flash-message__paragraph">
              120.000 VNĐ
           </p>
         </article>
      </div>
      <div class="flash-message flash-message--warning" style="background-color:#FFCC33">
         <article>
            <h2 class="flash-message__header" style="position: relative;
            padding: 2rem;
            text-align: center;
            background-color: 	#CCFFFF;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 0.5rem;
            border-top-left-radius: 1rem;">
               Gói 1000
            </h2>
            <p class="flash-message__paragraph">
               1000 lượt check CIC/ tháng
            </p>
            <p class="flash-message__paragraph">
              150.000 VNĐ
           </p>
         </article>
      </div>
   </div>   
     
   </div>
     
     
    
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');

body {
   display: flex;
   min-width: 100vw;
   min-height: 100vh;
   align-items: center;
   justify-content: center;
   
   font-family: 'Montserrat';
   
   background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
        background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
        background-attachment: fixed;
        background-repeat: no-repeat;
        padding: 0;
        margin: 0;
}

.flash-messages {
   display: grid;
   padding: 1rem;
   margin: 0 auto;
   max-width: 800px;
   grid-template-columns: repeat( auto-fit, minmax(350px, 1fr));
   grid-gap: 3rem;
}

.flash-message {
   position: relative;
   padding: 2rem;

   text-align: center;

   background-color: white;
   border-top-right-radius: 0.5rem;
   border-bottom-right-radius: 1rem;
   border-bottom-left-radius: 0.5rem;
   border-top-left-radius: 1rem;


}

.flash-message__header {
   margin-top: auto;
}

.flash-message__image {
   width: 100%;
   height: auto;
   margin-bottom: 2rem;
   
   border-radius: 999px;
}

.flash-message__paragraph {
   margin-top: 0;
   font-family: Georgia, Times, 'Times New Roman', serif;
   font-size: 18px;
}

.flash-message__close {
   position: absolute;
   right: 2rem;
   bottom: -1.5rem;
   width: 5em;
   height: 3rem;
   
   color: white;
   font-weight: 700;
   font-family: 'Montserrat';

   border-width: 0;
   border-radius: 999px;
   background-color: #FFCC99;
}

</style>