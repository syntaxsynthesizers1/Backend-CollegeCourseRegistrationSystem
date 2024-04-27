

$('.grid').isotope({
  itemSelector: '.element-item',
  layoutMode: 'fitRows'
});

$('.button-group  button').click(function(){
  $('.button-group  button').removeClass('active');
  $(this).addClass('active');

  var selector = $(this).attr('data-filter');
  $('.grid').isotope({
      filter:selector
  });
  return  false;
});



$('#product .owl-carousel').owlCarousel({
  loop:true,
  margin:50,
  nav:true,
  dots:false,
  autoplay:true,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
  responsive:{
    0:{
      items:1
    },
    600:{
      items:3
    },
    1000:{
      items:4
    }
  }
  
})
  

let qtyUp = document.querySelectorAll(".qty-up");
let qtyDown = document.querySelectorAll(".qty-down");

for(let i = 0; i < qtyUp.length; i++)
{
  qtyUp[i].addEventListener('click',function()
  {
    this.classList.add('increase');
    if(this.classList.contains('increase'))
    { 
      if(this.nextElementSibling.value >= 1 && this.nextElementSibling.value <= 9)
      {
         this.nextElementSibling.value++;
         let price = this.parentElement.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling
         let priceFixed = this.parentElement.previousElementSibling

         price.textContent = parseInt(price.textContent) + parseInt(priceFixed.textContent);
         getTotal()
      }
    }
  })
}

for(let i = 0; i < qtyDown.length; i++)
{
  qtyDown[i].addEventListener('click',function()
  {
    this.classList.add('decrease');
    if(this.classList.contains('decrease'))
    { 
      if(this.previousElementSibling.value >= 2)
      {
         this.previousElementSibling.value--;
         let price = this.parentElement.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling
         let priceFixed = this.parentElement.previousElementSibling

         price.textContent = parseInt(price.textContent) - parseInt(priceFixed.textContent);
         getTotal()

      }
    }
  })
}


function getTotal()
{
  let sumTotal  =  document.querySelectorAll('.product-price');
  let priceTotal = document.getElementById('total-price');
  let total = 0;
  for(let i = 0; i<sumTotal.length; i++)
  {
    total += parseInt(sumTotal[i].textContent)
  }
  priceTotal.value = total;
}
// setInterval(getTotal,1000)
