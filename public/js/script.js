var coll = document.getElementsByClassName("collapsible");
   var i;
   
   for (i = 0; i < coll.length; i++) {
     coll[i].addEventListener("click", function() {
       this.classList.toggle("active");
       var content = this.nextElementSibling;
       if (content.style.display === "block") {
         content.style.display = "none";
       } else {
         content.style.display = "block";
       }
     });
   }
/*    function searchDatabase() {
 
$(document).ready(function() {
  $('#search').on('change', function() {
      $.ajax({
          url: "{{ route('/search', ['input_value' => '']) }}/" + $(this).val(),
          type: 'GET',
          dataType: 'json',
          success: function(data) {
              var options = '';
              $.each(data, function(index, item) {
                  options += '<option value="' + item.id + '">' + item.name + '</option>';
              });
              $('#select_option').html(options);
          }
      });
  });
}); */
    
    /* function searchDatabase() {
      
    var searchValue = document.getElementById("search").value;
        // rest of the code that uses searchValue variable
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      }); 
      //document.write(searchValue); 

       $.ajax({
        url: "/search",
        type: "POST",
        data: { searchValue: searchValue },
        success: function(data) {
          // Display the results in the list box
          var listBox = document.getElementById("results");
          listBox.innerHTML = "";
    
          for (var i = 0; i < data.length; i++) {
            var option = document.createElement("option");
            option.text = data[i].name;
            listBox.add(option);
          }
        },
        error: function(xhr, status, error) {
          // error handling code
          document.write(searchValue); 
        }
    
      });    
 }*/