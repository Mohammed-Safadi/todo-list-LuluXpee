var add = document.getElementById('add');
//var done = document.getElementById('done')
var Delete = document.getElementById('delete');


add.addEventListener("click", function(){

   var div = document.createElement("div");
   div.classList.add('position')
  var inputValue = document.getElementById("input").value;
  var h = document.createElement("h3")
  h.classList.add('txt')
  h.setAttribute("id", "content")
  var t = document.createTextNode(inputValue);
  h.appendChild(t);
 
  var div2 = document.createElement("div");
  div2.classList.add('absolute')
  div2.classList.add('status')
  div.appendChild(div2)
  var span1 = document.createElement("span")
  var t1 = document.createTextNode('Mark as Done |')
  span1.appendChild(t1)
  span1.classList.add('done')
  span1.setAttribute("id", "done")
  div2.appendChild(span1)
 
  
  var span2= document.createElement("span")
  var t2 = document.createTextNode(' Delete')
  span2.appendChild(t2)
  span2.classList.add('delete')
  span2.setAttribute("id", "delete")
  div2.appendChild(span2)

   div.addEventListener('mouseover',function(){
    div2.style.display= ('block')
    })





  
 
  var hr = document.createElement("hr")
  h.appendChild(hr)
  div.appendChild(h)

  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(div);
  }
  document.getElementById("input").value = "";

  

 

 /*for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
   // var div = this.parentElement;
   div.style.display = "none"
    span.style.display = "none";
  }
 } */

})
/*
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
   // var div = this.parentElement;
   div.style.display = "none"
    span.style.display = "none";
  }
}




done.addEventListener("click", function(){
    console.log('helleo')
  var content = document.getElementById('content')
  content.style.color = ('green')
  done.style.display=("none")

})




Delete.addEventListener("click", function(){
       console.log('bbbye')
})
   */

   document.addEventListener('click',function (e) {

    if (e.target.className == 'delete'){
        //console.log("hello")
        
        var de = e.target.parentNode

        de.parentNode.remove();
    }


   if (e.target.className == 'done'){
        //console.log("hello")
        
        
       var mark = e.target.parentNode
       var gr = mark.parentNode
       gr.style.color = 'green'
       e.target.style.display ='none'

    }
       
   })

