
function petparse(pet) {
    var out = {};
    for( const [key, entry] of Object.entries(pet)) {
        
        if(!(key.replace("color","") in out)) {
            
            out[key.replace("color","")] = {"color":"0"};
        }
        
        if(!key.includes("color")) {
           
            out[key]["type"] = entry; 
        }
        else {
            out[key.replace("color", "")]["color"] = entry;
        }
    }
    console.log("FINISHEDPARSE",out);
    return out;
}


function render(elem, p) {
    // console.log(petparse(p));
    elem.replaceChildren();


    for(const [key, obj]  of Object.entries(petparse(p))) {
        if(["name","fart"].includes(key)) {
            continue;
        }
        console.log("PP",key,obj);
        var part = document.createElement("img");
        part.className = "pet";
        part.src = "static/" + obj.type + "_"  + key + ".png";
        console.log(part.src);
        part.style.filter = "hue-rotate(" + obj.color +"deg)";
        
        

        console.log(part.style.filter);
        elem.appendChild(part);
    }
    
    

}

