#### Build app:

```bash
# clone repository
git clone https://github.com/danilo4web/symfone-microservice-example

# go to folder
cd symfone-microservice-example

# build containers
make build
```

#### Routes:

###### Show Items:
```
URL: http://0.0.0.0:8080/products
TYPE: GET
```

###### Insert:
```
http://0.0.0.0:8080/product
TYPE: POST
PAYLOAD:
{
    "nome": "Book", 
    "price": "9.99"
}
```

###### Search:
```
URL: http://0.0.0.0:8080/products
TYPE: POST
PAYLOAD:
{
    "nome": "Book"
}
```
