$(document).ready(function () {
    $("#checkbox1").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox1").css({ "background-color": "#55b360" });
        $("#textbox1 label,#textbox1 p").css({ color: "white" });
      }  
      else {
        $("#textbox1").css({ "background-color": "white" });
        $("#textbox1 label,#textbox1 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox2").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox2").css({ "background-color": "#55b360" });
        $("#textbox2 label,#textbox2 p").css({ color: "white" });
      }  
      else {
        $("#textbox2").css({ "background-color": "white" });
        $("#textbox2 label,#textbox2 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox3").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox3").css({ "background-color": "#55b360" });
        $("#textbox3 label,#textbox3 p").css({ color: "white" });
      }  
      else {
        $("#textbox3").css({ "background-color": "white" });
        $("#textbox3 label,#textbox3 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox4").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox4").css({ "background-color": "#55b360" });
        $("#textbox4 label,#textbox4 p").css({ color: "white" });
      }  
      else {
        $("#textbox4").css({ "background-color": "white" });
        $("#textbox4 label,#textbox4 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox5").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox5").css({ "background-color": "#55b360" });
        $("#textbox5 label,#textbox5 p").css({ color: "white" });
      }  
      else {
        $("#textbox5").css({ "background-color": "white" });
        $("#textbox5 label,#textbox5 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox6").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox6").css({ "background-color": "#55b360" });
        $("#textbox6 label, #textbox6 p").css({ color: "white" });
        $("#textbox6 label , #textbox6 small").css({ display: "block" , color: "white" });

      }  
      else {
        $("#textbox6").css({ "background-color": "white" });
        $("#textbox6 label,#textbox6 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox7").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox7").css({ "background-color": "#55b360" });
        $("#textbox7 label,#textbox7 p").css({ color: "white" });
      }  
      else {
        $("#textbox7").css({ "background-color": "white" });
        $("#textbox7 label,#textbox7 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox8").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox8").css({ "background-color": "#55b360" });
        $("#textbox8 label,#textbox8 p").css({ color: "white" });
      }  
      else {
        $("#textbox8").css({ "background-color": "white" });
        $("#textbox8 label,#textbox8 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox9").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox9").css({ "background-color": "#55b360" });
        $("#textbox9 label,#textbox9 p").css({ color: "white" });
      }  
      else {
        $("#textbox9").css({ "background-color": "white" });
        $("#textbox9 label,#textbox9 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox10").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox10").css({ "background-color": "#55b360" });
        $("#textbox10 label,#textbox10 p").css({ color: "white" });
        $("#textbox10 label , #textbox10 small").css({ display: "block" , color: "white" });
      }  
      else {
        $("#textbox10").css({ "background-color": "white" });
        $("#textbox10 label,#textbox10 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox11").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox11").css({ "background-color": "#55b360" });
        $("#textbox11 label,#textbox11 p").css({ color: "white" });
      }  
      else {
        $("#textbox11").css({ "background-color": "white" });
        $("#textbox11 label,#textbox11 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $("#checkbox12").mousedown(function () {
      if (!$(this).is(":checked")) {
        $("#textbox12").css({ "background-color": "#55b360" });
        $("#textbox12 label,#textbox12 p").css({ color: "white" });
      }  
      else {
        $("#textbox12").css({ "background-color": "white" });
        $("#textbox12 label,#textbox12 p").css({ color: "#707c8a" });
        console.log(checkbox1);
      }
    });
    $('#c_lists').multiselect({

      // allows HTML content
      enableHTML: false,
    
      // CSS class of the multiselect button
      buttonClass: 'custom-select',
    
      // inherits the class of the button from the original select
      inheritClass: false,
    
      // width of the multiselect button
      buttonWidth: 'auto',
    
      // container that holds both the button as well as the dropdown
      buttonContainer: '<div class="btn-group" />',
    
      // places the dropdown on the right side
      dropRight: false,
    
      // places the dropdown on the top
      dropUp: true,
    
      // CSS class of the selected option
      selectedClass: 'active',
    
      // maximum height of the dropdown menu
      // if maximum height is exceeded a scrollbar will be displayed
      maxHeight: true,
    
      // includes Select All Option
      includeSelectAllOption: true,
    
      // shows the Select All Option if options are more than ...
      includeSelectAllIfMoreThan: 0,
    
      // Lable of Select All
      selectAllText: ' Select all',
    
      // the select all option is added as additional option within the select
      // o distinguish this option from the original options the value used for the select all option can be configured using the selectAllValue option.
      selectAllValue: 'multiselect-all',
    
      // control the name given to the select all option
      selectAllName: true,
    
      // if true, the number of selected options will be shown in parantheses when all options are seleted. 
      selectAllNumber: true,
    
      // setting both includeSelectAllOption and enableFiltering to true, the select all option does always select only the visible option
      // with setting selectAllJustVisible to false this behavior is changed such that always all options (irrespective of whether they are visible) are selected
      selectAllJustVisible: true,
    
      // enables filtering
      enableFiltering: true,
    
      // determines if is case sensitive when filtering
      enableCaseInsensitiveFiltering: true,
    
      // enables full value filtering
      enableFullValueFiltering: true,
    
      // if true, optgroup's will be clickable, allowing to easily select multiple options belonging to the same group
      enableClickableOptGroups: true,
    
      // enables collapsible OptGroups
      enableCollapsibleOptGroups:true,
    
      // collapses all OptGroups on init
      collapseOptGroupsByDefault: true,
    
      // placeholder of filter filed
      filterPlaceholder: 'Search',
    
      // possible options: 'text', 'value', 'both'
      filterBehavior: 'text',
    
      // includes clear button inside the filter filed
      includeFilterClearBtn: true,
    
      // prevents input change event
      preventInputChangeEvent: true,
    
      // message to display when no option is selected
      nonSelectedText: 'None selected',
    
      // message to display if more than numberDisplayed options are selected
      nSelectedText: 'selected',
    
      // message to display if all options are selected
      allSelectedText: 'All selected',
    
      // determines if too many options would be displayed
      numberDisplayed: 3,
    
      // disables the multiselect if empty
      disableIfEmpty: true,
    
      // message to display if the multiselect is disabled
      disabledText: '',
    
      // the separator for the list of selected items for mouse-over
      delimiterText: ', ',
    
      // includes Reset Option
      includeResetOption: false,
    
      // includes Rest Divider
      includeResetDivider: true,
    
      // lable of Reset  Option
      resetText: 'Reset',
    
      // indent group options
      indentGroupOptions: true,
    
      // possible options: 'never', 'always', 'ifPopupIsSmaller', 'ifPopupIsWider'
      widthSynchronizationMode: 'never',
    
      // text alignment
      buttonTextAlignment: 'center',  
    });
  });

  $( function() {
    $( "#sortable" ).sortable();
  } );

  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
 });

 function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#blah").attr("src", e.target.result);
      $("#blah_1").attr("src", e.target.result);
      $("#blah_2").attr("src", e.target.result);
      $("#blah_3").attr("src", e.target.result);
      $("#blah_4").attr("src", e.target.result);
      $("#blah_5").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}


//   $('input[type=checkbox]').change(function(){
//     $(".totalchecked").css({"display":"block"})
//     var number = $('input[type=checkbox]:checked').length;
//     $('.totalchecked').html(number);
// });
  
 


 

  /*!
 * bootstrap-tooltip-custom-class
 * v1.1.0
 * Extends Bootstrap Tooltips and Popovers by adding custom classes.
 * https://github.com/andreivictor/bootstrap-tooltip-custom-class#readme
 */

$(document).ready(function(){
  
  $('.js-btn-tooltip').tooltip();
  $('.js-btn-tooltip--custom').tooltip({
    customClass: 'tooltip-custom'
  });
  $('.js-btn-tooltip--custom-alt').tooltip({
    customClass: 'tooltip-custom-alt'
  });
  
  $('.js-btn-popover').popover();
  $('.js-btn-popover--custom').popover({
    customClass: 'popover-custom'
  });
  $('.js-btn-popover--custom-alt').popover({
    customClass: 'popover-custom-alt'
  });
  
});