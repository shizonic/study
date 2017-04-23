# silent mode
.SILENT: list

.PHONY: clean

# declaring variables
some_var := abc

# evaluate other variable (= operator)
foo = $(bar)
bar = $(baz)
baz = qux value here

# conditional assignment
assignment = foo
assignment ?= bar

# concatenating assignment
hello_world = hello
hello_world += world

# shell
calculation := $(shell echo $$((1 + 1)))

files = foo.txt bar.txt baz.txt


# makros

define do_lots_of_things
	echo "Hi there"
	echo "I do lots of things"
	echo "So it's best I do this in this macro"
endef


# functions

define foo
	@echo "I was called with the arguments:$1,$2,$3"
endef

help:
	@echo foo: does foo stuff
	@echo bar: does bar stuff
	@echo baz: does baz stuff

clean:
	@echo do some cleaning stuff!
	rm -f *.css
	rm -f *.txt
	rm -f *.map

lint:
	jshint *.js --show-non-errors

compile: test.scss foo.scss
	sass test.scss test.css
	sass $< foo.css

list: foo.txt bar.txt baz.txt
	for i in $^; do \
		echo "Dependency: $$i"; \
	done

foo:
	echo foo > foo-file.txt

bar:
	echo bar > bar-file.txt

baz: foo bar
	echo baz | cat - foo-file.txt bar-file.txt > baz-file.txt

aaa:
	@echo $@ > "$@-file.txt"

bbb:
	@echo $@ > "$@-file.txt"

ccc: aaa bbb
	@files=$$(echo $^ | sed -E 's/([a-z]+)/\1-file.txt/g'); echo $@ | cat - $$files > "$@-file.txt"

ddd: eee-file.txt fff-file.txt
	echo $@ | cat - $^ > $@-file.txt

%-file.txt:
	echo "x" $* > $@
	
bing/bop.txt:
	@# do nothing

foo/bar/baz.txt: bing/bop.txt
	@echo $(@D)
	@echo $(@F)
	@echo -------
	@echo $(<D)
	@echo $(<F)	
	
dynamic-%:
	@echo "Placeholder value: $* and target value: $@"

print_var:
	@# dereferencing a variable
	@echo $(some_var)

recursive:
	@# recursive dereferencing
	@echo $(foo)

conditional_assignment:
	@echo $(assignment)

say_hello:
	@echo $(hello_world)

stuff:
	@$(do_lots_of_things)

filter: foo.txt bar.txt baz.txt
	@echo $(filter ba%.txt, $^)

foo.txt:
	@# do nothing
	
bar.txt:
	@# do nothing

baz.txt:
	@# do nothing

shelled_value:
	@echo $(calculation)

dyn_eval:
	$(eval FOOBAR:=$(shell echo 123))
	@echo $(FOOBAR)

change_ext:
	@echo $(files:.txt=.doc)

call_foo:
	$(call foo, "hello", "foo", "bar")

wildcard_func:
	@echo $(wildcard *.txt)
