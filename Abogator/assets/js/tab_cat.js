(function(){
            if(document.getElementsByClass){
                    var c=document.getElementById('componente').getElementsByClass('tab_cat');
                    for(var i=0;i<c.length;i++){
                        parsear_tab_cat(c[i]); 
                    }
                }else{
                    var tags=document.getElementById('componente').getElementsByTagName('div');
                    for(var i=0;i<tags.length;i++){
                        if(/tab_cat(\s|$)/.test(tags[i].className))
                        parsear_tab_cat(tags[i]); 
                    }
                }
            function parsear_tab_cat(tab_cat){
                var hs=tab_cat.childNodes;
                var tablas=[];
                for(var i=0;i<hs.length;i++){
                    if(hs[i].nodeType==1&&/table/i.test(hs[i].tagName)){
                        hs[i].className=(hs[i].className?hs[i].className+" ":"")+"tab_cat_h";
                        if(hs[i].caption){
                            if(hs[i].caption.title){
                                hs[i].titulo=hs[i].caption.title;
                            }else{
                                hs[i].titulo=hs[i].caption.childNodes[0].nodeValue;
                                hs[i].caption.style.display="none";
                            }    
                        }else{
                                hs[i].titulo="Título "+i;
                        }
                        
                        tablas.push(hs[i]);
                    }
                    if(hs[i].nodeType==1&&/div/i.test(hs[i].tagName)){
                        hs[i].className=(hs[i].className?hs[i].className+" ":"")+"tab_cat_h";
                        var cn=hs[i].childNodes;
                        for(var n=0;n<cn.length;n++){
                            if(cn[n].nodeType==1){
                                if(/h[1-6]/i.test(cn[n].tagName)){
                                    if(cn[n].title){
                                        hs[i].titulo=cn[n].title;
                                    }else{
                                        hs[i].titulo=cn[n].childNodes[0].nodeValue;
                                        cn[n].style.display="none";
                                    }    
                                }else{
                                    hs[i].titulo="Título "+i;
                                }
                                break;
                            }
                        }
                        tablas.push(hs[i]); 
                    }
                }
                
                if(tablas.length){
                    var sel=[tablas[0],0];
                    var barra=document.createElement('ul');
                    barra.className="tab_cat_barra";
                    for(var i=0;i<tablas.length;i++){
                        var bot=document.createElement('li');
                        bot.appendChild(document.createTextNode(tablas[i].titulo.replace(/\s+/g,"\u00a0")));
                        bot.idt=i;
                        barra.appendChild(bot);
                        barra.appendChild(document.createTextNode(" "));
                        bot.onclick=function(){
                            if(sel[1]!=this){
                                tablas[this.idt].style.display="";
                                this.className="sel";
                                sel[0].style.display="none";
                                sel[1].className="";
                                sel[0]=tablas[this.idt];
                                sel[1]=this;    
                            }
                            
                        }
                        if(!i)sel[1]=bot;
                        tablas[i].style.display="none";
                    }
                    tab_cat.insertBefore(barra,tablas[0]);
                    sel[0].style.display="";
                    sel[1].className="sel";
                }                
            }
            
        })();