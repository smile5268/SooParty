


   $(function () {
       

         // var t=$("#text_box1");
         //加
        $("#add1").click(function () {
         	  var n=$(this).prev().val();

               // var t=$("#text_box1");
           var num=parseInt(n)+1;
              if (num==0) {
              	return ;
              }
              $(this).prev().val(num);
            
         });

        $("#min1").click(function () {
        	var n=$(this).next().val();
           var num=parseInt(n)-1;
          if (num==0) {
          	  return ;
          }
          $(this).next().val(num)
         
           });

     });

//  $(document).ready(function(){
// //加的效果
// alert(11111);
// $("#add1").click(function(){
// var n=$(this).prev().val();
// var num=parseInt(n)+1;
// if(num==0){ return;}
// $(this).prev().val(num);
// });
// //减的效果
// $("#min1").click(function(){
// var n=$(this).next().val();
// var num=parseInt(n)-1;
// if(num==0){ return}
// $(this).next().val(num);
// });
// })