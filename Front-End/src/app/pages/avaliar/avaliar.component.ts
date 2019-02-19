import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-avaliar',
  templateUrl: './avaliar.component.html',
  styleUrls: ['./avaliar.component.css']
})
export class AvaliarComponent implements OnInit {

     imagemDefault:String = '../../assets/userDefault.png';
     userName: String = 'Default Name';
     mainImageDefault = "url(assets/imagemDefundoDefault.jpeg)";
     icons:string[] = [this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false),this.iconsTipes(false)];

  constructor() { }

  ngOnInit() {
  }

  iconsTipes(type:boolean){
    if(type==true){
       return 'star';
    }
    else{
       return 'star_border';
    }

  }
}
