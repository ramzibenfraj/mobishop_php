
let tnd_eth_fx;
var total = "<?php echo isset($subTotal) ? $cart->getSum($subTotal) : 0; ?>";
  console.log(total);
let price_tnd = total ;
let account;

// Get the latest exchange rate from Coinbase API
fetch("https://api.coinbase.com/v2/exchange-rates?currency=ETH")
  .then(response => response.json())
  .then(data => {
    tnd_eth_fx = data.data.rates.TND;
  })
  .catch(err => {
    console.log("Error fetching exchange rate: ", err);
  });

document.getElementById('connect-button').addEventListener('click', event => {
  let button = event.target;
  ethereum.request({method: 'eth_requestAccounts'}).then(accounts => {
    account = accounts[0];
    console.log(account);
    button.textContent = account;

    ethereum.request({method: 'eth_getBalance' , params: [account, 'latest']}).then(result => {
      console.log('balance: '+ result);
      let wei = parseInt(result,16);
      console.log('wei: ' + wei);
      let balance = wei / (10**18);
      console.log(balance + ' ETH');
    });
  });
});

document.getElementById('send-button').addEventListener('click', event => {
  let amount_eth = price_tnd / tnd_eth_fx;
  let amount_wei = '0x' + (amount_eth * 10**18).toString(16);
  console.log('amount_eth: ' + amount_eth);
  console.log('amount_wei: ' + amount_wei);
  
  let transactionParam = {
    to: '0xA79d0a2731ed4d8D72AE7e577DEfd035B6fad2E6',
    from: account,
    value: amount_wei
  };
  
  ethereum.request({method: 'eth_sendTransaction', params:[transactionParam]}).then(txhash => {
    console.log(txhash);
    checkTransactionconfirmation(txhash).then(r => alert(r));
  });
});

function checkTransactionconfirmation(txhash) {
  let checkTransactionLoop = () => {
    return ethereum.request({method:'eth_getTransactionReceipt',params:[txhash]}).then(r => {
      if(r !=null) return 'Transaction confirmed!';
      else return checkTransactionLoop();
    });
  };
  return checkTransactionLoop();
}