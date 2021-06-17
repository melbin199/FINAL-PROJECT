class PasswordStrengthMeter{
  constructor(criteria){
      this._criteria = [...criteria];
  }
  
  isValid(pass){
      return !this.validatePassword(pass).some(item=>!item.result)
   }
  
  validatePasswordStrength(pass){
      const validated = this.validatePassword(pass);
      return validated.reduce((acc, curr)=>acc+curr.weight);
    }
  
  validatePassword(pass){
      return this._criteria.map(item=>{
        return Object.assign({}, item, {result: item.test(pass)})
      });
    }
}