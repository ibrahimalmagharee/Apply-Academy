
(function(){
  'use strict';
  
  $(document).ready(function(){

  	let form = $('.bootstrap-form');

  	// On form submit take action, like an AJAX call
    $(form).submit(function(e){

        if(this.checkValidity() == false) {
            $(this).addClass('was-validated');
            e.preventDefault();
            e.stopPropagation();
        }

    });

    // On every :input focusout validate if empty
    $(':input').blur(function(){
    	let fieldType = this.id;

    	switch(fieldType){
    	    // personal validation
            case 'name':
                validateName($(this));
                break;

            case 'id':
                validateID($(this));
                break;

            case 'birthday':
                validateBirthday($(this));
                break;

            case 'birth_place':
                validatebBirth_Place($(this));
                break;

            case 'country':
                validateCountry($(this));
                break;

            case 'address':
                validateAddress($(this));
                break;

            case 'phone':
                validatePhone($(this));
                break;

            case 'status':
                validateStatus($(this));
                break;

            case 'job':
                validateJob($(this));
                break;

            case 'job_place':
                validateJob_Place($(this));
                break;

            case 'branch':
                validateBranch($(this));
                break;

            case 'facebook':
                validateFacebook($(this));
                break;

            case 'twitter':
                validateTwitter($(this));
                break;

            case 'instegram':
                validateInstegram($(this));
                break;

            case 'youtube':
                validateYoutube($(this));
                break;

            case 'web_page':
                validateWeb_Page($(this));
                break;

              // qualification validation
            case 'certifical':
                validateCertifical($(this));
                break;

            case 'specification':
                validateSpecification($(this));
                break;

            case 'average':
                validateAverage($(this));
                break;

            case 'grad':
                validateGrad($(this));
                break;

            case 'university':
                validateUniversity($(this));
                break;

            case 'gradyear':
                validateGradyear($(this));
                break;

            case 'gradcountry':
                validateGradcountry($(this));
                break;

            case 'language':
                validateLanguage($(this));
                break;


               //  experince validation
            case 'companyname':
                validateCompanyName($(this));
                break;

            case 'companyaddress':
                validateCompanyAddress($(this));
                break;

            case 'datefrom':
                validateDateFrom($(this));
                break;

            case 'dateto':
                validateDateTo($(this));
                break;

            case 'leavejob':
                validateLeaveJob($(this));
                break;
                // studies validation
            case 'placepublication':
                validatePlacePublication($(this));
                break;

            case 'datepublication':
                validateDatePublication($(this));
                break;

                // master and doctor validation
            case 'noCheck':
                validateNoCheck($(this));
                break;

            case 'yesCheck':
                validateYesCheck($(this));
                break;

            case 'paid':
                validatePaid($(this));
                break;

            case 'languages':
                validateLanguages($(this));
                break;

                //voluntary and payment research
            case 'brief':
                validateBrief($(this));
                break;

            case 'yesb':
                validateYesB($(this));
                break;

            case 'yesm':
                validateYesM($(this));
                break;

            case 'yesd':
                validateYesD($(this));
                break;

            case 'yesnons':
                validateYesNonS($(this));
                break;

            case 'bacalorios':
                validateBacalorios($(this));
                break;

            case 'master':
                validateMaster($(this));
                break;

            case 'doctor':
                validateDoctor($(this));
                break;

            case 'nons':
                validateNonS($(this));
                break;


                // login and register and forget validation

    		case 'email':
                validateEmail($(this));
                break;
                
            case 'username':
                validateUserName($(this));
                break;



    	}
	});


	// On every :input focusin remove existing validation messages if any
    $(':input').click(function(){

    	$(this).removeClass('is-valid is-invalid');

    });
    // radio button for status
    $(function() {
        $("#submit").click(function() {     
          if($('input[type=radio][name=OrderStatus]:checked').length == 0)
          {
             alert("Please select atleast one");
             return false;
          }
          else
          {
              alert("radio button selected value: ");
          }      
        });
    });





    // On every :input focusin remove existing validation messages if any
    $(':input').keydown(function(){

        $(this).removeClass('is-valid is-invalid');

    });

	// Reset form and remove validation messages
    $(':reset').click(function(){
        $(':input, :checked').removeClass('is-valid is-invalid');
    	$(form).removeClass('was-validated');
    });

  });

    // Validate login and register and forget

    function validateEmail(thisObj) {
        let fieldValue = thisObj.val();
        let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

        if(pattern.test(fieldValue)) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    function validateUserName(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length >= 10) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }




    // validate personal
    function validateName(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length >= 10) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }

        

    }

    function validateID(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue.length == 9) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateBirthday(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validatebBirth_Place(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateCountry(thisObj){
        let fieldValue = thisObj.val();

        if (   fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateAddress(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validatePhone(thisObj){
        let fieldValue = thisObj.val();
        let pattern = /[0-9]*/;

        if ( pattern.test(fieldValue) && fieldValue.length == 10){
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }

    }

    function validateStatus(thisObj){
        let fieldValue = thisObj.val();

        if (   fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateJob(thisObj){
        let fieldValue = thisObj.val();

        if (   fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateJob_Place(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateBranch(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateFacebook(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateTwitter(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateInstegram(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateYoutube(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateWeb_Page(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }
    // validate qulificaion
    function validateCertifical(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateSpecification(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateAverage(thisObj){
        let fieldValue = thisObj.val();

        if (fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateGrad(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length >= 10) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }


    function validateUniversity(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }


    function validateGradyear(thisObj){
        let fieldValue = thisObj.val();

        if ( fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateGradcountry(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }


    function validateLanguage(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }
  // validate experiences
    function validateCompanyName(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateCompanyAddress(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateDateFrom(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateDateTo(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateLeaveJob(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    // validate studies
    function validatePlacePublication(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateDatePublication(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    //validate master and doctor
    function validateNoCheck(thisObj) {

        if($(':radio#noCheck:checked').length > 0) {
            $(thisObj).addClass('is-valid');
        } else if ($(':radio#yesCheck:checked').length > 0){
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }
    }

    function validateYesCheck(thisObj) {


        if($(':radio#noCheck:checked').length > 0) {
            $(thisObj).addClass('is-valid');
        } else if ($(':radio#yesCheck:checked').length > 0){
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }
    }

    function validatePaid(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateLanguages(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }
    // validate payment and voluntary research and project
    function validateBrief(thisObj){
        let fieldValue = thisObj.val();
        let pattern=/^[a-zA-Zء-ي\s]+$/i;
        if (  pattern.test(fieldValue) && fieldValue.length >= 10) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }
    function validateYesB(thisObj) {

        if($(':checkbox:checked').length > 0) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    function validateYesM(thisObj) {

        if($(':checkbox:checked').length > 0) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    function validateYesD(thisObj) {

        if($(':checkbox:checked').length > 0) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    function validateYesNonS(thisObj) {

        if($(':checkbox:checked').length > 0) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    function validateBacalorios(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateMaster(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateDoctor(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    function validateNonS(thisObj){
        let fieldValue = thisObj.val();
        if (fieldValue != "") {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');

        }



    }

    


})();
