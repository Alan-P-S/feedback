let branchDropDown = document.getElementById('branch');
let semesterDropDown = document.getElementById('semester');
let subjectDropDown = document.getElementById('subjects');
console.log(branchDropDown);

let jsonData;
let branch;
let semester;



fetch('subject.json').then(response=>response.json()).then(function(data){
    jsonData = data;
    getBranch(jsonData);
})

function getBranch(jsonData){
    let out ="";
    console.log(jsonData);
    out+=`<option value="">Choose branch</option>`;
    for(let branch in jsonData){
        
        out += `<option value="${branch}">${branch}</option>`;
        console.log(branch);
        
    }
    branchDropDown.innerHTML = out;
}


branchDropDown.addEventListener('change',getSemester);
semesterDropDown.addEventListener('change',getSubject);

function getSemester(){
     branch = branchDropDown.value;
    if(branch.trim()==""){
        semesterDropDown.disable = true;
        semesterDropDown.selectedIndex = 0;
        return false;
    }

     semester = jsonData[branch];
    let out = "";

    out = `<option value="">Choose Semester</option>`;

    for(let sem in semester){
        out += `<option value="${sem}">${sem}</option>`;
    }

    semesterDropDown.innerHTML = out;
    semesterDropDown.disable = false;
}
function getSubject(){
    let sem = semesterDropDown.value;
    console.log(sem);
    if(sem.trim()==""){
        subjectDropDown.disable = true;
        semesterDropDown.selectedIndex = 0;
        return false;
    }

    let subjects = jsonData[branch][sem];
    console.log(subjects);
    let out = "";

    out = `<option value="">Choose Subject</option>`;

    subjects.forEach(subject=>{
        console.log(subject)
        out += `<option value="${subject}">${subject}</option>`;
    })
            
        

    subjectDropDown.innerHTML = out;
    subjectDropDown.disable = false;
}