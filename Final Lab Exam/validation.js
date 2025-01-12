function validateForm() {
    var formId = document.forms[0].id; // Get form id dynamically
    var name = document.forms[formId]["name"].value;
    var contact_no = document.forms[formId]["contact_no"].value;
    var username = document.forms[formId]["username"].value;

    if (name == "" || contact_no == "" || username == "") {
        alert("All fields must be filled out.");
        return false;
    }
    return true;
}
