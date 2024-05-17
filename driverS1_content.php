

<style>
        body {  
        font-family:'Times New Roman', Times, serif;
        font-size:1rem;
        font-weight:400;
        line-height:1.5;
        color:#52565b;
    }  
    * { 
        box-sizing: border-box;
    } 

    body { 
        margin: 0; 
        font-family: 'Times New Roman', Times, serif; 
        font-size: 1rem; 
        font-weight: 400; 
        line-height: 1.5; 
        color: #52565b; 
        background-color: #fff; 
        -webkit-text-size-adjust: 100%; 
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    } 

    .container-fei { 
        text-align: center; 
        width: 80%; 
        margin: 10%; 
        height: 70%; 
        color: white; 
        margin-top: 3%; 
        margin-bottom: 5%; 
        display: flex; 
        position: relative; 
        flex-direction: row; 
        justify-content: center; 
        align-items: center; 
        align-content: center; 
        padding: 20px; 
        background-color: #ffffff;
    } 

    *,:before,:after { 
        box-sizing: border-box;
    } 

    .fa-w17 { 
        animation-name: fadeInUp;
    } 

    .container-jdz { 
        width: 100%; 
        direction: rtl; 
        text-align: right; 
        border-radius: 10px; 
        padding: 10px; 
        box-shadow: 0 10px 20px  rgba(170, 170, 170, 0.7);
    } 

    .container-1nw { 
        max-width: 600px; 
        margin: 30px; 
        height: 100%;
    } 

    .container-jdz .form-group-cpd  { 
        box-sizing: border-box; 
        display: block; 
        padding: 15px; 
        text-align: center; 
        color: rgb(255, 255, 255); 
        border-radius: 10px;
    } 

    img { 
        vertical-align: middle;
    } 

    .container-1nw img  { 
        max-width: 100%; 
        height: auto; 
        border-radius: 10px;
    } 

    .container-82o { 
        max-width: 100%; 
        background-color: #EEF9FF; 
        border-radius: 10px; 
        opacity: 80%; 
        text-align: center; 
        box-shadow: #000; 
        padding: 0 10px;
    } 

    button { 
        border-radius: 0;
    } 

    button { 
        margin: 0; 
        color: white; 
        font-size: inherit; 
        line-height: inherit;
    } 

    button { 
        text-transform: none;
    } 

    button { 
        -webkit-appearance: button;
    } 

    .btn-f9s { 
        padding: 10px; 
        border: 1px; 
        border-radius: 10px; 
        color: white; 
        cursor: pointer; 
        font-size: 16px; 
        font-weight: 600; 
        background-color: #06657A; 
        text-align: center; 
        direction: ltr; 
        width: fit-content; 
        margin: 0px 30%; 
        box-shadow: 0 20px 20px rgba(117, 116, 116, 0.7);
    } 

    .btn-f9s { 
        color: #ffffff; 
        text-decoration: none;
    } 

    button:not(:disabled) { 
        cursor: pointer;
    } 

    .btn-f9s:hover { 
        background-color: #9dc1dfce; 
        color: #fff;
    } 

    p { 
        margin-top: 0; 
        margin-bottom: 1rem;
    } 

    .mb-6n4 { 
        margin-bottom: 1.5rem !important;
    } 

    .text-imm p  { 
        color: black; 
        font-size: 40px; 
        text-align: center; 
        line-height: 4; 
        margin: 12;
    } 


    @keyframes fadeInUp { 
    0% {  
        opacity: 0; 
        transform: translate3d(0,100%,0); 
        opacity: 0; 
        transform: translate3d(0px, 100%, 0px); 
    }  
    100% {  
        opacity: 1; 
        transform: none; 
        opacity: 1; 
        transform: none; 
    }  

    } 
    /* These were inline style tags. Uses id+class to override almost everything */
    #style-laCd2.style-laCd2 {  
    visibility: visible;  
        animation-delay: 0.1s;  
        animation-name: fadeInUp;  
    }  
    #style-iZnBk.style-iZnBk {  
    color:black;  
        font-size: 22px;  
        direction: rtl;  
    }  

</style>

<?php
include('master.php');

?>
<div class="container-fei">
    <div class="fa-w17 style-laCd2" id="style-laCd2">
        <div class="container-1nw">
            <img src="/img/se-del.png">
        </div>
    </div>
    <div class="container-jdz">
        <form action="/driverS2_content.php" class="form-group-cpd">
            <div class="container-82o">
                <div class="text-imm">
                    <p align="justify" class="mb-6n4 style-iZnBk" id="style-iZnBk">انضم إلينا واختر السائق المناسب لنقلك بأمان إلى وجهتك </p>
                </div>
            </div>
            <button class="btn-f9s">معرفة المزيد &gt;&gt;</button>
        </form>
    </div>
</div>