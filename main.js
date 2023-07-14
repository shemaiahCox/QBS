// There are many ways to pick a DOM node; here we get the form itself and the email
// input box, as well as the span element into which we will place the error message.

const form = document.querySelector("form");
const sectionWrapper = document.querySelector(".form-section-wrapper");


/****************************************************
   First Name
*****************************************************/

const firstName = document.getElementById("firstName");
const firstNameError = document.querySelector("div.firstname-error");
const firstNameValidation = /^[a-z0-9]+$/i;

firstName.addEventListener("input", (event) => {
  // Each time the user types something, we check if the
  // form fields are valid.

  const firstNameValidation = /^[a-z0-9]+$/i;

  if (firstNameValidation.test(firstName.value)) {
    // In case there is an error message visible, if the field
    // is valid, we remove the error message.
    firstNameError.textContent = ""; // Reset the content of the message
    firstNameError.className = "error"; // Reset the visual state of the message
    firstName.style.border = 'none'
  } else {
    // If there is still an error, show the correct error
    showFirstNameError();
  }
});

function showFirstNameError() {
  if (firstName.value === '') {
    // If the field is empty,
    // display the following error message.
    firstNameError.textContent = "You need to enter your first name.";
    firstName.style.border = '5px solid #fb0063'
  } else if (!firstNameValidation.test(firstName.value)) {
    // If the field doesn't contain a first name,
    // display the following error message.
    firstNameError.textContent = "First name needs to be alphanumeric";
    firstName.style.border = '5px solid #fb0063';
  } else if (firstName.value > 50) {
    // If the data is too short,
    // display the following error message.
    firstNameError.textContent = `First name should be less than 50 characters; you entered ${firstName.value.length}.`;
  }

  // Set the styling appropriately
  firstNameError.className = "error active";
}

/****************************************************
   Surname - as above
*****************************************************/

const surname = document.getElementById("surname");
const surnameError = document.querySelector("div.surname-error");

const surnameValidation = /^[a-z0-9]+$/i;

surname.addEventListener("input", (event) => {

  if (surnameValidation.test(surname.value)) {
    surnameError.textContent = ""; 
    surnameError.className = "error"; 
    surname.style.border = 'none'
  } else {
    showSurnameError();
  }
});

function showSurnameError() {
  if (surname.value === '') {
    surnameError.textContent = "You need to enter your surname.";
    surname.style.border = '5px solid #fb0063'
  } else if (!surnameValidation.test(surname.value)) {
    surnameError.textContent = "Last name needs to be alphanumeric";
    surname.style.border = '5px solid #fb0063'
  } else if (surname.value > 50) {
    surnameError.textContent = `Surname should be less than 50 characters; you entered ${surname.value.length}.`;
  }
  surnameError.className = "error active";
}

/****************************************************
   Tile - as above
*****************************************************/

const title = document.getElementById("title");
const titleError = document.querySelector("div.title-error");

title.addEventListener("input", (event) => {

  if (title.value) {
    titleError.textContent = ""; 
    titleError.className = "error"; 
    title.style.border = 'none'
  } else {
    showTitleError();
  }
});

function showTitleError() {
  if (title.value === '') {
    titleError.textContent = "You need to select a title";
    title.style.border = '5px solid #fb0063'
  } 
  titleError.className = "error active";
}

/****************************************************
   Age - as above
*****************************************************/

const age = document.getElementById("age");
const ageError = document.querySelector("div.age-error");

const ageValidation = /^[1-9]{2}$/i;
const ageNegativeInteger =  /^-/;

age.addEventListener("input", (event) => {
  if (ageValidation.test(age.value)) {
    ageError.textContent = ""; 
    ageError.className = "error"; 
    age.style.border = 'none';
  } else {
    showAgeError();
  }
});

function showAgeError() {
  if (age.value === '') {
    ageError.textContent = "You need to enter an age.";
    age.style.border = '5px solid #fb0063'
  } else if (!ageValidation.test(age.value) || ageNegativeInteger.test(age.value)) {
    ageError.textContent = "Age needs to be a positive 2-digit number";
    age.style.border = '5px solid #fb0063'
  } 
  ageError.className = "error active";

}
