<form action="tester.php" method="get">
    <label for="search"></label>
    <input name="search" id="search" type="text">

    <button type="submit">Submit</button>
</form>

<p></p>
you searched for <?php echo htmlspecialchars($_GET['search']); ?>.



<script type="text/javascript">
    class card{
    constructor(img,name,power,jp,etext,placement,types,ftext,set,tag){
        this.img=img;
        this.name=name;
        this.pc=power;
        this.jp=jp;
        this.etext=etext;
        this.placement=placement;
        this.types=types;
        this.ftext=ftext;
        this.set=set;
        this.tag=tag;
    }

   
}
    var search=<?= json_encode($_GET['search']);?>;
    const output=csearch(search);
    for (let i=0;i<output.length; i++){
        var img= new Image(200,280);
        img.src= output[i].img;
        document.body.appendChild(img);

    }

    

    function allthecards(){
        const cards=[];
        cards.push(new card("images\\20_20_20_20.png","20/20/20/20",4,-100,
                "All [Animatronic] cards you play for the rest of this turn attack when played"
                , new Array("0") ,new Array("customization"),"", "fcg1",new Array("0")))
        cards.push(new card("images\\8-bit_baby.png","8-Bit Baby",3,0,
                "You may Scrap this card to send 1 [Child] from play to the salvage. If it was yours- gain 30%. If not- pay 20%. {red:When this card is played:} Reveal the top 5 cards of your deck, add 1 card with \"Baby\" in its name or [Child] type- Then, Archive."
                , new Array("off") ,new Array("character", "Humanoid", "game"),"", "fcg1",new Array("adventure")))
        return cards

    
}
 

    function csearch(search){
        const trusearch=search.split(" ");

        var cards=allthecards();

        

        var count=0;
        var marker; 
        var tracker=false;
        var notdone=true; 
        var howlong=0;
        var temparray=[];
        var tempint;
        
        while(notdone){
            while (!tracker){
                if (trusearch[count].toLowerCase().includes("pc:")) {
                    marker = "pc:";
                    tracker=true;
                }


                if (trusearch[count].toLowerCase().includes("jp:")) {
                    marker = "jp:";
                    tracker=true;
                }

                if (trusearch[count].toLowerCase().includes("etext:")) {
                    marker = "etext:";
                    tracker=true;
                }

                if (trusearch[count].toLowerCase().includes("place:")) {
                    marker = "place:";
                    tracker=true;
                }

                if (trusearch[count].toLowerCase().includes("type:")) {
                    marker = "type:";
                    tracker = true;
                }
                if (trusearch[count].toLowerCase().includes("ftext:")) {
                    marker = "ftext:";
                    tracker=true;
                }
                if (trusearch[count].toLowerCase().includes("set:")) {
                    marker = "set:";
                    tracker=true;
                }
                if (trusearch[count].toLowerCase().includes("tag:")) {
                    marker = "tag:";
                    tracker=true;
                }
                if (!tracker) {
                    marker="";
                    tracker = true;
                }
            }
            switch (marker) {
                case (""):
                    temparray=[];
                    for(let i=0; i<cards.length; i++){
                        if (cards[i].name.toLowerCase().includes(trusearch[count].toLowerCase())){
                            temparray.push(cards[i]);
                        }

                    }
                    cards=temparray;
                    break;

                    case("pc:"):
                        howlong=trusearch[count].length
                        temparray=[];
                        
                        switch(trusearch[count].substring(3,4)){
                            case("="):
                                
                                for(let i=0; i<cards.length; i++){
                                    
                                    if (cards[i].pc==parseInt(trusearch[count].substring(4,howlong))){
                                        temparray.push(cards[i]);
                            }
                        }
                            cards=temparray;
                            break;

                            case("<"):
                                
                                for(let i=0; i<cards.length; i++){
                                    if (cards[i].pc<parseInt(trusearch[count].substring(4,howlong))){
                                        temparray.push(cards[i]);
                            }
                        }
                            cards=temparray;
                            break;
                            case(">"):
                                
                                for(let i=0; i<cards.length; i++){
                                    if (cards[i].pc>parseInt(trusearch[count].substring(4,howlong))){
                                        temparray.push(cards[i]);
                            }
                        }
                            cards=temparray;
                            break;

                    
                                



                        }
                        break;

                case("jp:"):

                    howlong=trusearch[count].length
                        temparray=[];
                        
                        switch(trusearch[count].substring(3,4)){
                            case("="):
                                
                                for(let i=0; i<cards.length; i++){
                                    
                                    if (cards[i].jp==parseInt(trusearch[count].substring(4,howlong)) && cards[i].jp != -100){
                                        temparray.push(cards[i]);
                            }
                        }
                            cards=temparray;
                            break;

                            case("<"):
                                
                                for(let i=0; i<cards.length; i++){
                                    if (cards[i].jp<parseInt(trusearch[count].substring(4,howlong)) && cards[i].jp != -100){
                                        temparray.push(cards[i]);
                            }
                        }
                            cards=temparray;
                            break;
                            case(">"):
                                
                                for(let i=0; i<cards.length; i++){
                                    if (cards[i].jp>parseInt(trusearch[count].substring(4,howlong)) && cards[i].jp != -100){
                                        temparray.push(cards[i]);
                            }
                        }
                            cards=temparray;
                            break;

                    
                                



                        }
                        break;



                case("etext:"):

                    temparray=[]
                    howlong=trusearch[count].length
                    for(let i=0; i<cards.length; i++){
                        if (cards[i].etext.toLowerCase().includes(trusearch[count].substring(6,howlong).toLowerCase())){
                            temparray.push(cards[i]);
                        }

                    }
                    cards=temparray;
                    break;

                case("ftext:"):

                    temparray=[]
                    howlong=trusearch[count].length
                    for(let i=0; i<cards.length; i++){
                        if (cards[i].ftext.toLowerCase().includes(trusearch[count].substring(6,howlong).toLowerCase())){
                            temparray.push(cards[i]);
                        }

                    }
                    cards=temparray;
                    break;

                    case("set:"):

                    temparray=[]
                    howlong=trusearch[count].length
                    for(let i=0; i<cards.length; i++){
                        if (cards[i].set.toLowerCase().includes(trusearch[count].substring(4,howlong).toLowerCase())){
                            temparray.push(cards[i]);
                        }

                    }
                    cards=temparray;
                    break;

                    case("place:"):

                    temparray=[]
                    howlong=trusearch[count].length
                    
                    
                    for(let i=0; i<cards.length; i++){
                        
                        
                        if (cards[i].placement.includes((trusearch[count].substring(6,howlong).toLowerCase()))){
                            temparray.push(cards[i]);
                        }
                    

                    }
                    cards=temparray;
                    break;

                    case("type:"):

                    temparray=[]
                    howlong=trusearch[count].length
                    
                    
                    for(let i=0; i<cards.length; i++){
                        
                        
                        if (cards[i].types.includes((trusearch[count].substring(5,howlong).toLowerCase()))){
                            temparray.push(cards[i]);
                        }
                    

                    }
                    cards=temparray;
                    break;
                    
                    case("tag:"):

                    temparray=[]
                    howlong=trusearch[count].length
                    
                    
                    for(let i=0; i<cards.length; i++){
                        
                        
                        if (cards[i].tag.includes((trusearch[count].substring(4,howlong).toLowerCase()))){
                            temparray.push(cards[i]);
                        }
                    

                    }
                    cards=temparray;
                    break;

            
                default:
                    break;
            }

            marker="";
            tracker=false;
            if (trusearch.length==count+1){
                notdone=false;
            }
            count++;
        }



        return cards

}

</script>


