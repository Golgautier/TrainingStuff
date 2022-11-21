FROM ubuntu

RUN apt update && apt install -y  iputils-ping bind9-utils curl

COPY script.sh .

CMD ["/script.sh"]
