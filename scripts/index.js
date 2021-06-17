/**
 * index.js
 * - All our useful JS goes here, awesome!
 */

const form = document.querySelector(".my-form");
const password = form.querySelector(".my-form input[name=password-input]");
const confirmPassword = form.querySelector('.my-form input[name=password-confirm-input]');
const passwordConditions = form.querySelector(".my-form .password-conditions");

const containsNumber = (pass = "") => /\d/.test(pass);
const containsSpecialChar = (pass = "") => /[!@#$%^&*(),.?":{}|<>]/.test(pass);

const minLen = min => (pass = "") => pass.length >= min;
const maxLen = max => (pass = "") => pass.length < max;
const isEqual = (val1="", val2="") => val1.trim()===val2.trim();

const isConfirmPasswordEqual = () => (isEqual(password.value, confirmPassword.value))

const testCriteria = [
  {
    name: "Passwords are equal",
    test: isConfirmPasswordEqual
  },
  {
    name: "At least one number character",
    test: containsNumber
  },
  {
    name: "At least one special character",
    test: containsSpecialChar
  },
  {
    name: "Minimum 8 characters",
    test: minLen(8)
  },
  {
    name: "Maximum 18 characters",
    test: maxLen(18)
  }
];

const passMatcher = new PasswordStrengthMeter(testCriteria);

const createValidationCriteriaElement = (template, title) => {
  const el = template.content.cloneNode(true);
  el.querySelector(".text").textContent = title;
  return el;
};

const createValidationMark = title => (
  createValidationCriteriaElement(
    document.getElementById("markTemplate"),
    title
  )
);

const createValidationCross = title => (
  createValidationCriteriaElement(
    document.getElementById("crossTemplate"),
    title
  )
);

const onPasswordChange = (e)=>{
  const results = passMatcher.validatePassword(e.target.value);
  passwordConditions.innerHTML = "";
  
  for(let i =0;i<results.length;i++){
    let el= results[i].result ? createValidationMark(results[i].name): createValidationCross(results[i].name);
    
    passwordConditions.appendChild(el);
  }
  
};

password.addEventListener("keyup", onPasswordChange);
confirmPassword.addEventListener("keyup", onPasswordChange);
