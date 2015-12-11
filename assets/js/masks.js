function CEPMask(cep){
            if(integerMask(cep)==false){
            event.returnValue = false;
        }       
        return formatField(cep, '00.000-000', event);
}

function PhoneMask(phone){  
        if(integerMask(phone)==false){
                event.returnValue = false;
        }       
        return formatField(phone, '(00)0000-0000', event);
}

function CPFMask(cpf){
        if(integerMask(cpf)==false){
                event.returnValue = false;
        }       
        return formatField(cpf, '000.000.000-00', event);
}

function ValidatesPhone(phone){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(phone.value))
                alert('Numero de Telefone Invalido!');
}

function ValidatesCEP(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value))
                alert('Numero de CEP Invalido!');               
}

function ValidatesCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var typedDigit = eval(cpf.charAt(9)+cpf.charAt(10));
        var sum1=0, sum2=0;
        var vle =11;

        for(i=0;i<9;i++){
                sum1+=eval(cpf.charAt(i)*(vle-1));
                sum2+=eval(cpf.charAt(i)*vle);
                vle--;
        }       
        sum1 = (((sum1*10)%11)==10 ? 0:((sum1*10)%11));
        sum2=(((sum2+(2*sum1))*10)%11);

        var generatedDigit=(sum1*10)+sum2;
        if(generatedDigit!=typedDigit)        
                alert('CPF Invalido!');         
}

function integerMask(){
    if (event.keyCode < 48 || event.keyCode > 57){
            event.returnValue = false;
            return false;
    }
    return true;
}

function charMask(){
    var caract = new RegExp(/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/i);
    var caract = caract.test(String.fromCharCode(event.keyCode));
    if(!caract){
         event.returnValue = false;
         return false;
    }
    return true;
}

function formatField(field, Mask, event) { 
        var maskBoolean; 

        var Digitato = event.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        onlyNumber = field.value.toString().replace( exp, "" ); 

        var positionField = 0;    
        var NewValueField = "";
        var MaskLenght = onlyNumber.length;; 

        if (Digitato != 8) { // backspace 
                for(i=0; i<= MaskLenght; i++) { 
                        maskBoolean  = ((Mask.charAt(i) == "-") || (Mask.charAt(i) == ".")
                                                                || (Mask.charAt(i) == "/")) 
                        maskBoolean  = maskBoolean || ((Mask.charAt(i) == "(") 
                                                                || (Mask.charAt(i) == ")") || (Mask.charAt(i) == " ")) 
                        if (maskBoolean) { 
                                NewValueField += Mask.charAt(i); 
                                  MaskLenght++;
                        }else { 
                                NewValueField += onlyNumber.charAt(positionField); 
                                positionField++; 
                          }              
                  }      
                field.value = NewValueField;
                  return true; 
        }else { 
                return true; 
        }
}