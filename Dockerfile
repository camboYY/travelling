FROM node:6.11.5

RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app
COPY package.json .
RUN npm install
COPY . .

ARG DOCKER_ENV
ENV NODE_ENV=${DOCKER_ENV}

EXPOSE 9090
CMD [ "npm", "start" ]

