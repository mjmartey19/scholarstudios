const nav = document.querySelector('.nav_links'),
openNavBtn = document.querySelector('#nav_toggle_open'),
closeNavBtn = document.querySelector('#nav_toggle_close');
const accordionContent = document.querySelectorAll(".accordion-content");
const worksBtn = document.querySelector(".nav_links .works");
console.log(worksBtn);

worksBtn.addEventListener("click", (e)=>{
    e.preventDefault();
})

// FAQs JavaScript Section 
accordionContent.forEach((item, index) => {
    let header = item.querySelector("header");
    console.log(item);
    header.addEventListener("click", () => {
        item.classList.toggle("open");

        let description = item.querySelector(".desc");
        if (item.classList.contains("open")) {
            description.style.height = `${description.scrollHeight}px`; //scollHeight property returns the height of n element including padding bit excluding borders, and margin
            item.querySelector("i").classList.replace("fa-plus", "fa-minus")
        } else {
            description.style.height = "0px";
            item.querySelector("i").classList.replace("fa-minus", "fa-plus")
        }
        removeOpen(index);
        console.log(description);
    })

})

function removeOpen(index1){
    accordionContent.forEach((item2, index2) => {
        if (index1 != index2) {
            item2.classList.remove("open");
            
           let des = item2.querySelector(".desc");
            des.style.height = "0px";
            item2.querySelector("i").classList.replace("fa-minus", "fa-plus")
        }
    })
}

openNavBtn.addEventListener("click", ()=>{
    nav.classList.add("active");
})


closeNavBtn.addEventListener("click", ()=>{
    nav.classList.remove("active");
})

//Add a click event listner to the page
document.addEventListener("click", (event)=>{
    //Check if the click was outside the openNavBtn
  if(!openNavBtn.contains(event.target)){
      //Close the nav-list if the click in outside the openNavBtn
       nav.classList.remove("active");
  }
});

window.onscroll = () =>{
   if(window.innerWidth < 991){
      menu.classList.remove('fa-times');
      header.classList.remove('active');
      document.body.classList.remove('active');
   }

   document.querySelectorAll('section').forEach(sec =>{
      let top = window.scrollY;
      let offset = sec.offsetTop - 150;
      let height = sec.offsetHeight;
      let id = sec.getAttribute('id');

      if(top >= offset && top < offset + height){
         document.querySelectorAll('.nav_links li a').forEach(links =>{
            links.classList.remove('active');
            document.querySelector('.nav_links li a[href*='+ id +']').classList.add('active')
            console.log(links)
         });
      };

   });
}



// light Box css
let body = document.querySelector("body"),
    lightBox = document.querySelector(".lightBox"),
    img = document.querySelectorAll(".portfolio .box-container .box img"),
    showImg = lightBox.querySelector(".showImg img"),
    close = lightBox .querySelector(".close");
   for (let image of img) {
     image.addEventListener("click", ()=>{
       showImg.src = image.src;
       lightBox.style.display = "block";
       body.style.overflow = "hidden";
       close.onclick = ()=>{
         lightBox.style.display = "none";
         body.style.overflow = "visible";
       };
     });
   }


/*=============== SHOW SCROLL UP ===============*/ 
function scrollUp(){
    const scrollUp = document.getElementById('scroll-up');
    // When the scroll is higher than 400 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if(this.scrollY >= 400) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)


/*===============SLIPER SLIDER====*/
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    loop:true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
    },
});



