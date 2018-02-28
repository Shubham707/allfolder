<div id='sectioncont' class="buy-sell-order clearfix">
  <div id='tableAskList' data-id="sectioncont">

  

  <div class="maichu">
  <div class="b-s-title clearfix">
      <div class="b-s-t-left">Last BID <span class="unit-symbol" id="orderUnitSymbol">฿</span><span class="unit-symbol hide" id="cnySymbol">$</span><span class="red" id='orderbook_last_rate'>0.000249</span></div>
       </div>

    <div class="m_con maidan">
      <box padding-bottom=0 class= "right-list list" >
      <li class= "title-line sorting" style="height:30px; margin-top:15px;border-bottom: 1px solid #e4ebf0">
          <span class= "right-align price" ><b>Price</b></span>
          <span class= "volume right-align" ><b>Amount(EOS)</b></span>
          <span class= "total right-align" ><b>Total(BTC)</b></span>
        </li>

        <div id="bid-list">
       
        </div>
      </box>
    </div>
  </div>

  <div class="mairu">
    <div class="b-s-title clearfix">
      <div class="b-s-t-left">Last ASK <span class="unit-symbol" id="orderUnitSymbol">฿</span><span class="unit-symbol hide" id="cnySymbol">$</span><span class="red" id='orderbook_last_rate'>0.000249</span></div>
      
    </div>
    <div class="m_con maidan">
      <box padding-bottom=0 class= "right-list list" >
          <li class= "title-line sorting" style="height:30px; margin-top:15px;border-bottom: 1px solid #e4ebf0">
          <span class= "right-align price" ><b>Price</b></span>
          <span class= "volume right-align" ><b>Amount(EOS)</b></span>
          <span class= "total right-align" ><b>Total(BTC)</b></span>
        </li>
        <div id="ask-list" >
        
        </div>
      </box>
    </div>
  </div>



  <template data-id="ask-list-item-tpl" >
    <li class="list-item-number-ask">
      <span data-id="price"  class="price right-align" ></span>
      <span data-id="volume" class="volume right-align"></span>
      <span data-id="total" class="total right-align" ></span>
      <span data-id="rect" class="right-align rect down orange" ></span>
    </li>
  </template>
  <template data-id="bid-list-item-tpl" >
    <li class="list-item-number-bid">
      <span data-id="price" class="price right-align" ></span>
      <span data-id="volume" class="volume right-align"  ></span>
      <span data-id="total" class="total right-align"></span>
      <span data-id="rect" class="right-align rect down fenlv" ></span>
    </li>
  </template>

</div>
