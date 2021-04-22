USERSPACE=velmie
NAMESPACE=wallet
SERVICE=customization

APP=service_${SERVICE}
PROJECT?=bitbucket.org/${USERSPACE}/${NAMESPACE}-${SERVICE}
DATE := $(shell date +'%Y.%m.%d %H:%M:%S')

ndef = $(if $(value $(1)),,$(error required environment variable $(1) is not set))

ifndef COMMIT
	COMMIT := $(shell git rev-parse HEAD)
endif

ifndef TAG
	TAG = $(shell git describe --exact-match --tags $(git log -n1 --pretty='%h') 2>/dev/null)
endif

GOOS?=linux
DOCKER_TAG?=wallet-customization
GO111MODULE?=on
GOPRIVATE?=bitbucket.org/velmie

show:
	@echo ${PROJECT}
	@echo ${DATE}

fast_build:
	CGO_ENABLED=0 GOOS=${GOOS} go build \
		-ldflags '-s -w -X "${PROJECT}/version.DATE=${DATE}" -X ${PROJECT}/version.COMMIT=${COMMIT} -X ${PROJECT}/version.TAG=${TAG}' \
		-o ${APP}

build: clean
	CGO_ENABLED=0 GOOS=${GOOS} go build -a -installsuffix cgo \
		-ldflags '-s -w -X "${PROJECT}/version.DATE=${DATE}" -X ${PROJECT}/version.COMMIT=${COMMIT} -X ${PROJECT}/version.TAG=${TAG}' \
		-o ${APP}

docker-build:
	$(call ndef,REPOSITORY_PRIVATE_KEY)
	docker build . --build-arg REPOSITORY_PRIVATE_KEY --build-arg TAG=${TAG} -t ${DOCKER_TAG}

gen-protobuf:
	protoc --proto_path=. --go_out=. --twirp_out=. rpc/customization/customization.proto

clean:
	@[ -f ${APP} ] && rm -f ${APP} || true
