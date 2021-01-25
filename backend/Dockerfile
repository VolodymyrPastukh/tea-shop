FROM python:3.7.4-alpine3.10
RUN apk add --no-cache --virtual .build-deps g++ python3-dev libffi-dev openssl-dev && \
    apk add --no-cache --update python3 && \
    pip3 install --upgrade pip setuptools
RUN pip3 install pendulum service_identity
RUN mkdir /usr/src/app
WORKDIR /usr/src/app
RUN pip install PyMySQL
COPY requirements.txt /usr/src/app/requirements.txt
RUN pip install -r requirements.txt
COPY . /usr/src/app
ENTRYPOINT ["python"]
CMD ["app.py"]
