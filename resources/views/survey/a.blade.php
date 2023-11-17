<body>
    <h4 id="title">Select2 - Ajax - Multiple Selections</h4>
    <h5>Click on 'PreSelect' Button to preselect data</h5>
    <div id="maincontainer" class="clearfix">
      <!-- main content s-->
      <div id="contentwrapper">
        <div class="main_content">
          <div class="row-fluid">
            <div class="span6" id="employeeColumn">
              <div class="control-group">
                <label class="control-label">Employee Name (String): </label>
                <div class="controls">
                  <input type="text" class="tags" id="select2_ajax_simple_id" />                
                </div>
              </div>
              <!--control group -->
            </div>
            <!-- Employee Column -->					
                      <button id="preselectSimpleDataButton" class="btn" type="submit"><i class="icon-plus" alt="OK"></i> PreSelect Simple Data </button>
                       <label>Selects String - Srinivas Chekuri </label>					
          </div>
          <!-- row-fluid -->
                  
                  <!--Code for Select2 Object -->
                   <div class="row-fluid">
            <div class="span6" id="employeeComplexColumn">
              <div class="control-group">
                <label class="control-label">Employee Name (Object): </label>
                <div class="controls">
                  <input type="text" class="tags" id="select2_ajax_complex_id" />                
                </div>
              </div>
              <!--control group -->
            </div>
            <!-- Employee Column -->					
                      <button id="preselectObjectDataButton" class="btn" type="submit"><i class="icon-plus" alt="OK"></i> PreSelect Object</button>
                       <label>Selects Object - Srinivas Chekuri With Role </label>					
          </div>
          <!-- row-fluid -->
        </div>
        <!-- main_content -->
      </div>
      <!-- content wrapper -->
    </div>
    <!-- End of maincontainer -->
  </body>


<script>
    $(document).ready(function() {

var simple_employee_response = '["Srinivas Chekuri","Robert Hollinger", "Mike Sapp", "Nina Switz"]';
var complex_employee_response = '[{"id":"1", "name": "Srinivas Chekuri", "role":"Architect"},	{"id":"2", "name": "Robert Hollinger", "role":"Manager"}, {"id":"3", "name": "Mike Sapp", "role":"Developer"}, {"id":"4", "name": "Nina Switz", "role":"Business"}]';

$('#select2_ajax_simple_id').select2({
  tags: true,
  maximumSelectionSize: 10,
  minimumResultsForSearch: Infinity,
  multiple: true,
  minimumInputLength: 1,
  placeholder: "Search Employee",
  //data:o,
  id: function(i) {
    return i;
  },
  initSelection: function(element, callback) {

  },
  ajax: {
    type: 'post',
    url: "/echo/json/",
    allowClear: true,
    dataType: 'json',
    delay: 250,
    params: {
      contentType: "application/json"
    },
    data: function(term, page) {
      //Code for dummy ajax response
      return {
        json: simple_employee_response,
        delay: 0
      };
    },
    results: function(data, page) {
      return {
        results: data
      };
    },
    cache: false
  },
  formatResult: function(i) {
    return '<div>' + i + '</div>';
  }, // Formats results in drop down
  formatSelection: function(i) {
    return '<div>' + i + '</div>';
  }, //Formats result that is selected
  dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
  escapeMarkup: function(m) {
      return m;
    } // we do not want to escape markup since we are displaying html in results			
});

$('#select2_ajax_complex_id').select2({
  tags: true,
  maximumSelectionSize: 10,
  minimumResultsForSearch: Infinity,
  multiple: true,
  minimumInputLength: 1,
  placeholder: "Search Employee",
  //data:o,
  id: function(i) {
    return i;
  },
  initSelection: function(element, callback) {

  },
  ajax: {
    type: 'post',
    url: "/echo/json/",
    allowClear: true,
    dataType: 'json',
    delay: 250,
    params: {
      contentType: "application/json"
    },
    data: function(term, page) {
      //Code for dummy ajax response
      return {
        json: complex_employee_response,
        delay: 0
      };
    },
    results: function(data, page) {
      return {
        results: data
      };
    },
    cache: false
  },
  formatResult: function(i) {
    return '<div>' + i.name + '(' + i.role + ')' + '</div>';
  }, // Formats results in drop down
  formatSelection: function(i) {
    return '<div>' + i.name + '(' + i.role + ')' + '</div>';
  }, //Formats result that is selected
  dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
  escapeMarkup: function(m) {
      return m;
    } // we do not want to escape markup since we are displaying html in results			
})


$('#preselectSimpleDataButton').on('click', function() {
  // alert('I am here');
  $('#select2_ajax_simple_id').select2('data', ['Srinivas Chekuri']);
});

$('#preselectObjectDataButton').on('click', function() {
  // alert('I am here');
      var _array = []
  var o = new Object;
  o.id = "1";
  o.name = "Srinivas Chekuri";
  o.role = "Architect";
      _array.push(o);
  $('#select2_ajax_complex_id').select2('data', _array);
});
});

</script>