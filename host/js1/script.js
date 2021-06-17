 $(document).ready(function() {
      $("#sourcetable").find("input[type=checkbox]").each(function(index, element) {
          index = index + 1;
          $(element).attr("name", 'record' + index)

      });
      $(".addValue").click(function() {
          var record = $("#sourcetable> tbody> tr").length;
          var record = parseInt(record + 1);

          var userId = $("#addUi").val();
          var code = $("#addCode").val();
          var description = $("#addDescription").val();
          var dhlCountryId = $("#addCountryID").val();
          var markup = "<tr><td class='text-center'><input type='checkbox' name='record" + record + "'></td><td>" + userId + "</td><td>" + code + "</td><td>" + dhlCountryId + "</td><td>" + description + "</td></tr>";
          $("table#sourcetable tbody").prepend(markup);
          record += 1;
      });

      // Find and remove selected table rows
      $(".delete-row").click(function() {
          $("#sourcetable").find("input[type=checkbox]").each(function(index, element) {


              if ($(element).is(':checked')) {

                  $(element).closest("tr").remove();

              }
              $(element).attr("name", 'record' + index)

          });
      });


      $(".updateValue").click(function() {

          $("#sourcetable").find("input[type=checkbox]").each(function(index, element) {
              var trcheck = $(this).closest("table").find("input[type=checkbox]:checked").length;


              if ($(this).is(':checked') == true && trcheck == 1) {

                  var userIdU = $("#updateUi").val();
                  var codeU = $("#updateCode").val();
                  var descriptionU = $("#updateDescription").val();
                  var dhlCountryIdU = $("#updateCountryID").val();
                  if (userIdU != "") {
                      $(this).closest("tr").find("td:nth-child(2)").text(userIdU);
                      $(this).closest("tr").find("td:nth-child(3)").text(codeU);
                      $(this).closest("tr").find("td:nth-child(4)").text(descriptionU);
                      $(this).closest("tr").find("td:nth-child(5)").text(dhlCountryIdU);

                  }

              }


          });

      });


  });