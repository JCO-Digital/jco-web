theme := wp-content/themes/jco

all: install build

ci: install build

install:
	composer install
	cd $(theme); pnpm i

build:
	cd $(theme); pnpm run build

watch:
	cd $(theme); pnpm run watch

clean:
	rm -rf $(theme)/dist
	rm -rf $(theme)/node_modules
	rm -rf node_modules
	rm -rf vendor
