// // This will edited a brief
	// $('#per-page-projects').on('click', function(e) {
	//     e.preventDefault();   
	//       $.ajax({
	//         type: "POST",
	//         url:  $(this).data('url'),
	//         data: $('form#page-projects').serialize(),
	//         success: function(data) {
	//         	// alert(data);
	//          //    console.log('data');
	//               // if(data.status == 'success'){
	//               //   // $('#prstatusModal').modal('hide');
	//               //   $('#briefEditModal').modal('hide');
	//               //   $('.modal').hide();
	//               //   $('.modal-backdrop').remove();
	//               //   load_dynamiccontent(data.url);
	//                 // success_msg('Hello');                                                                            
	//                window.location.reload();
	//               // }else if (data.status == 'error') {
	//               //     load_dynamiccontent(data.url);
	//               //     error_msg(data.msg);                                                         
	//               // }
	//         }
	//       });
	    
	// });


	// $('.table-responsive').jscroll('retrieve');

	// or in jQuery
	// var pageNumber = 1;
	// var articles;
	// $.ajax({
	//     type : 'GET',
	//     // url: "apiURL + '/pages?page=' + pageNumber",
	//     url: "C:/xampp/htdocs/project-flow/public + '/pages?page=' + pageNumber",
	//     success : function(data){
	//     	cosole.log(url);
	//         pageNumber +=1;
	//                if(data.length == 0){
	//                   // :( no more articles
	//                }else{
	//                    // Great we have more articles
	//                     // articles = items .........
	//                }
	//     },error: function(data){
	                                                  
	//     },
	// })

	// Infinite-scroll
	// infinitescroll() is called on the element that surrounds 
	// the items you will be loading more of
// 	  $('#content').infinitescroll({
// 	   navSelector: "ul.pagination",
//        nextSelector: "ul.pagination a:first",
//        // selector: ".item",
//        itemSelector: "tr",
//        loadingText  : "Loading new page...", 
//        donetext     : "Congratulations you've reached in the last page...." 
// 	  }

// 	  ,function(arrayOfNewElems){
// 	  	// $(".tbodyLoadedData").append(arrayOfNewElems);
// 	  	console.log(arrayOfNewElems);
 
//      // optional callback when new content is successfully loaded in.
 
//      // keyword `this` will refer to the new DOM content that was just added.
//      // as of 1.5, `this` matches the element you called the plugin on (e.g. #content)
//      //                   all the new elements that were found are passed in as an array
 
// });


// $(document).trigger('retrieve.infscr');

	  	  // $('#content .tbodyLoadedData').infinitescroll('scroll');


	  // $('#content').infinitescroll({
	  //     navSelector     : "ul.pagination",
	  //     nextSelector    : "ul.pagination a:last",
	  //     itemSelector    : ".item",
	  //     // debug           : false,
	  //     dataType        : 'html',
	  //     path: function(index) {
	  //         return "?page=" + index;
	  //     }
	  // }, function(newElements, data, url){
	  //     var $newElems = $( newElements );
	  // 		console.log($newElems);
	  // 		// conosle.log(data.d);
	  //     $('#content .tbodyLoadedData').appendTo($newElems);
	  //     // $('#content').masonry().masonry( 'appended', $newElems, true);
	  //     // $('#content tbody').masonry().appendTo($newElems).masonry('appended', $newElems, true);

	  // });

	  // $('.tbodyLoadedData').jscroll({
	  //     // loadingHtml: '<img src="loading.gif" alt="Loading" /> Loading...',
	  //     padding: 20,
	  //     nextSelector: 'a.jscroll-next:last',
	  //     contentSelector: 'tr'
	  // });

	  // $(function() {
	      // $('.tbodyLoadedData').jscroll({
	      //     autoTrigger: true,
	      //     nextSelector: '.pagination li.active + li a', 
	      //     contentSelector: 'div.item',
	      //     callback: function() {
	      //         $('ul.pagination:visible:first').hide();
	      //     }
	      // });
	  // });


	  // $('#tbodyLoadedData').infinitescroll({
	  //     navSelector: "ul.pagination",
	  //     nextSelector: "ul.pagination a:first",
	  //     itemSelector    : ".item",
	  //     debug           : false,
	  //     dataType        : 'html',
	  //     path: function(index) {
	  //         return "?page=" + index;
	  //     }
	  // }, function(newElements, data, url){

	  //     var $newElems = $( newElements );
	  //     $('#tbodyLoadedData').masonry().masonry( 'appended', $newElems, true);

	  // });