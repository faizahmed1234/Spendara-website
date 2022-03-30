const bannerContainer = document.querySelector("#banner-container");
let n = 0;
bannerContainer.style.transition = "0.5s";
setInterval(() => {
     if (n == 0) {
         bannerContainer.innerHTML = `<img style="border-radius: 10px;" class="img-fluid" src="myimg/banner1.png" alt="screenshot">`; 
         n++;
     }else if (n == 1) {
          bannerContainer.innerHTML = `<img style="border-radius: 10px;" class="img-fluid" src="myimg/banner2.png" alt="screenshot">`;  
          n = 0;
     }      
}, 4000);